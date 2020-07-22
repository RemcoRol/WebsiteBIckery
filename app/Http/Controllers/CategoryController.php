<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
       $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('beheer.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beheer.categories.create');
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
            'category_name' => 'required',
            'category_type' => 'required',
        ]);
        $this->categoryRepository->create($request->all());

        return redirect()->route('beheer.categories.index')->with('success', 'Categorie is successvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $categorien
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $categorien
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories, $id)
    {
        $category = $this->categoryRepository->get($id);
        return view('beheer.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $categorien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories, $id)
    {
      $request->validate([
          'category_name' => 'required',
          'category_type' => 'required',
      ]);

      $category = $this->categoryRepository->get($id)->update($request->all());

      return redirect()->route('beheer.categories.index')->with('success', 'Categorie is successvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $categorien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories, $id)
    {
      $category = $this->categoryRepository->get($id)->delete();

      return redirect()->route('beheer.categories.index')->with('success', 'Categorie is successvol verwijderd!');
    }
}
