<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Repository\ProductRepositoryInterface;
use App\Repository\ProductImageRepositoryInterface;
use App\Repository\BrandRepositoryInterface;
use App\Models\Product;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    use UploadTrait;
    private $productRepository;
    private $productImageRepository;
    private $brandRepository;

    public function __construct(ProductRepositoryInterface $productRepository, BrandRepositoryInterface $brandRepository, ProductImageRepositoryInterface $productImageRepository)
    {
        $this->productRepository = $productRepository;
        $this->ProductImageRepository = $productImageRepository;
        $this->brandRepository   = $brandRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all();

        return view('beheer.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = $this->productRepository->all();
      $brands = $this->brandRepository->all();

      return view('beheer.products.create', [
          'products' => $products,
          'brands'   => $brands
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'brand_id' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $createdProduct = $this->productRepository->create($request->all());
        if ($request->has('product_image')) {
            // Get image file
            $image = $request->file('product_image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('product_name')).'_'.time();
            // Define folder path
            $folder = 'images/products/product_images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $product_image_url = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            //$user->profile_image = $filePath;

            $this->ProductImageRepository->create(['product_image_url' => $product_image_url, 'product_id' => $createdProduct->id]);
        }

        return redirect()->route('beheer.products.index')->with('success', 'Product is successvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = $this->productRepository->get($id);
      // Remove images from storage

      $productImages = $product->productImages;

      foreach ($productImages as $productImage) {
        if(\File::exists($productImage->product_image_url)){

          \File::delete($productImage->product_image_url);

        }else{
          dd('File does not exists.');
        }
        // Remove child model
        $productImage->delete();
      }

      // Remove model
      $product->delete();
      return redirect()->route('beheer.products.index')->with('message', 'Product is successvol verwijderd!');
    }
}
