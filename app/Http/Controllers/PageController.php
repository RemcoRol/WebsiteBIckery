<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Repository\PageRepositoryInterface;
use App\Repository\BrandRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use App\Traits\CreateView;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{
    use CreateView;

    private $pageRepository;
    private $brandRepository;
    private $categoryRepository;
    private $productRepository;

    public function getRouteKeyName()
    {
        return 'page_slug';
    }

    public function __construct(PageRepositoryInterface $pageRepository, BrandRepositoryInterface $brandRepository, CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $pages = $this->pageRepository->all();

        return view('beheer.pages.index', [
            'pages' => $pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('beheer.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_hidden' => 'required',
            'page_name' => 'required',
            'page_slug' => '',
            'page_meta_title' => 'required|string|min:3|max:60',
            'page_meta_description' => 'required|string|min:3|max:160',
        ]);

        $slug = Str::slug($request['page_name'], '-');

        $request->request->add(['page_slug' => $slug]);

        $this->createView($request['page_slug']);

        $this->pageRepository->create($request->all());

        return redirect()->route('beheer.pages.index')->with('success', 'Pagina is successvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return Application|Factory|Response|View
     */
    public function show(Page $page, $language, $slug)
    {
        $page = $this->pageRepository->getBySlug($slug);

        if ($page->page_slug == "premium-food" || $page->page_slug == "premium-drinks") {

            $page = $this->pageRepository->getBySlug($slug);
            $categories = $this->categoryRepository->getByName($page->page_name);

            $brands = $categories->merken->sortBy('brand_name');

            return view('site.pages.' . $page->page_slug, compact('page', 'brands'));
        }


        if ($page->page_slug == "merken") {
            $page = $this->pageRepository->getBySlug($slug);
            $brands = $this->brandRepository->orderBy('brand_name');

            return view('site.pages.' . $page->page_slug, compact('page', 'brands'));
        }

        if ($page != null) {
            return view('site.pages.' . $page->page_slug, compact('page'));
        }
        else {
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Response
     */
    public function edit(Page $page, $id)
    {
        $page = $this->pageRepository->get($id);

        return view('beheer.pages.edit', [
            'page' => $page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Page $page
     * @return Response
     */
    public function update(Request $request, Page $page, $id)
    {
        $request->validate([
            'page_hidden' => 'required',
            'page_name' => 'required',
            'page_slug' => '',
            'page_meta_title' => 'required|string|min:3|max:60',
            'page_meta_description' => 'required|string|min:3|max:160',
        ]);

        $slug = Str::slug($request['page_name'], '-');

        $request->request->add(['page_slug' => $slug]);

        $this->pageRepository->get($id)->update($request->all());

        return redirect()->route('beheer.pages.index')->with('success', 'Pagina is successvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return Response
     */
    public function destroy(Page $page, $id)
    {
        $this->pageRepository->get($id)->delete();

        return redirect()->route('beheer.pages.index')->with('success', 'Pagina is successvol verwijderd!');
    }
}
