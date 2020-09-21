<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandImage;
use App\Repository\BrandRepositoryInterface;
use App\Repository\BrandImageRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    use UploadTrait;

    private $brandRepository;
    private $categoryRepository;
    private $brandImageRepository;

    public function __construct(BrandRepositoryInterface $brandRepository, CategoryRepositoryInterface $categoryRepository, BrandImageRepositoryInterface $brandImageRepository)
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandImageRepository = $brandImageRepository;
    }

    public function index()
    {
        $brands = $this->brandRepository->orderBy('brand_name');

        return view('beheer.brands.index', [
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('beheer.brands.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required',
            'categories_id' => 'required',
            'brand_hidden' => 'required',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_logo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $brandId = $this->brandRepository->create($request->all());

        if ($request->has('brand_image') && $request->has('brand_logo_image')) {
            // Get image file
            $image = $request->file('brand_image');
            $logo = $request->file('brand_logo_image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($validatedData['brand_name']);
            // Define folder path
            $folder = 'images/site/brands/' . $validatedData['brand_name'] . '/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $product_image_url = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadBrandImage($image, $folder, 'public', $name);
            $this->uploadBrandLogo($logo, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            //$user->profile_image = $filePath;

            $imageLargePath = $replaced = Str::replaceArray('original', ['large_photos'], $product_image_url);
            $imageMediumPath = $replaced = Str::replaceArray('original', ['medium_photos'], $product_image_url);
            $imageMobilePath = $replaced = Str::replaceArray('original', ['mobile_photos'], $product_image_url);
            $imageTinyPath = $replaced = Str::replaceArray('original', ['tiny_photos'], $product_image_url);
            $imageLogoPath = 'images/site/brands/' . $name . '/logo/' . $name . '_logo.' . $logo->getClientOriginalExtension();

            $this->brandImageRepository->create([
                'brand_image_name' => $validatedData['brand_name'],
                'brand_image_alt_text' => $validatedData['brand_name'],
                'brand_image_original_url' => $product_image_url,
                'brand_image_large_url' => $imageLargePath,
                'brand_image_medium_url' => $imageMediumPath,
                'brand_image_mobile_url' => $imageMobilePath,
                'brand_image_tiny_url' => $imageTinyPath,
                'brand_image_logo' => $imageLogoPath,
                'brand_id' => $brandId->id
            ]);
        }

        return redirect()->route('beheer.brands.index')->with('success', 'Brand is successvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Brand $brands
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $categorien
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brands, $id)
    {
        $brand = $this->brandRepository->get($id);
        $categories = $this->categoryRepository->all();

        return view('beheer.brands.edit', [
            'categories' => $categories,
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Brand $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brands, $id)
    {
        $request->validate([
            'brand_name' => 'required',
            'categories_id' => 'required',
            'brand_hidden' => 'required',
        ]);

        $this->brandRepository->get($id)->update($request->all());

        return redirect()->route('beheer.brands.index')->with('success', 'Merk is successvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Brand $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand, $id)
    {
        $brand = $this->brandRepository->get($id);
        $products = $brand->products;

        foreach ($brand->images as $brandImage) {

            if (File::exists($brandImage->brand_image_original_url)) {
                File::deleteDirectory(public_path('images/site/brands/' . $brand->brand_name));
            }
            $brandImage->delete();
        }

        foreach ($products as $product) {
            $productImages = $product->productImages;

            foreach ($productImages as $productImage) {
                if (File::exists($productImage->product_image_url)) {
                    File::delete($productImage->product_image_url);
                }
                // Remove child model
                $productImage->delete();
            }
            $product->delete();
        }

        $brand->delete();

        return redirect()->route('beheer.brands.index')->with('success', 'Brand is successvol verwijderd!');
    }

}
