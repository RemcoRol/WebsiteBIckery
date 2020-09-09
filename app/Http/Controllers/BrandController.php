<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Repository\BrandRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   private $brandRepository;
   private $categoryRepository;
   private $brandImageRepository;

   public function __construct(BrandRepositoryInterface $brandRepository, CategoryRepositoryInterface $categoryRepository, BrandImageRepository $brandImageRepository)
   {
       $this->brandRepository = $brandRepository;
       $this->categoryRepository = $categoryRepository;
       $this->BrandImageRepository = $brandImageRepository;
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
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $request->validate([
           'brand_name' => 'required',
           'categories_id' => 'required',
           'brand_hidden' => 'required',
       ]);

       if ($request->has('image')) {
           // Get image file
           $image = $request->file('image');
           // Make a image name based on user name and current timestamp
           $name = Str::slug($request->input('image_name'));
           // Define folder path
           $folder = 'images/site/brands/' + $request->('brand_name');
           // Make a file path where image will be stored [ folder path + file name + file extension]
           $product_image_url = $folder . $name. '.' . $image->getClientOriginalExtension();
           // Upload image
           $this->uploadGlobalImage($image, $folder, 'public', $name);
           // Set user profile image path in database to filePath
           //$user->profile_image = $filePath;

           $imageLargePath = $replaced = Str::replaceArray('original', ['large_photos'], $product_image_url);
           $imageMediumPath = $replaced = Str::replaceArray('original', ['medium_photos'], $product_image_url);
           $imageMobilePath = $replaced = Str::replaceArray('original', ['mobile_photos'], $product_image_url);
           $imageTinyPath = $replaced = Str::replaceArray('original', ['tiny_photos'], $product_image_url);

           $this->imageRepository->create([
               'image_name' => $request['image_name'],
               'image_alt_text' => $request['image_alt_text'],
               'image_original_url' => $product_image_url,
               'image_large_url' => $imageLargePath,
               'image_medium_url' => $imageMediumPath,
               'image_mobile_url' => $imageMobilePath,
               'image_tiny_url' => $imageTinyPath,
               'page_id' => $request['page_id']

           ]);
           return redirect()->route('beheer.images.index')->with('success', 'Afbeelding is successvol toegevoegd!');
       }

       $this->brandRepository->create($request->all());

       return redirect()->route('beheer.brands.index')->with('success', 'Brand is successvol toegevoegd!');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Brand  $brands
    * @return \Illuminate\Http\Response
    */
   public function show(Brand $brands)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Category  $categorien
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
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Brand  $brands
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
    * @param  \App\Brand  $brands
    * @return \Illuminate\Http\Response
    */
   public function destroy(Brand $brand, $id)
   {
     $brand = $this->brandRepository->get($id);
     $products = $brand->products;

     foreach ($products as $product) {
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
        $product->delete();
     }

     $brand->delete();

     return redirect()->route('beheer.brands.index')->with('success', 'Brand is successvol verwijderd!');
   }

}
