<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Repository\BrandRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   private $brandRepository;

   public function __construct(BrandRepositoryInterface $brandRepository, CategoryRepositoryInterface $categoryRepository)
   {
       $this->brandRepository = $brandRepository;
       $this->categoryRepository = $categoryRepository;
   }

   public function index()
   {
       $brands = $this->brandRepository->all();

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
       ]);

       $this->brandRepository->create($request->all());

       return redirect()->route('beheer.brands.index')->with('success', 'Categorie is successvol toegevoegd!');
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
