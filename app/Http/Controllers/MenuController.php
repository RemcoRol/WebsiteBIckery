<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repository\MenuRepositoryInterface;
use App\Repository\PageRepositoryInterface;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    /**
     * @var MenuRepositoryInterface
     */
    private $menuRepository;
    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    public function __construct(MenuRepositoryInterface $menuRepository, PageRepositoryInterface  $pageRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $menus = Menu::where('menu_parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('menu_title','id')->all();
        return view('beheer.menus.index', compact('menus','allMenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $pages = $this->pageRepository->all();
        $allMenus = Menu::pluck('menu_title','id')->all();
        return view('beheer.menus.create', compact('allMenus', 'pages'));
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
            'menu_hidden' => 'required',
            'menu_title' => 'required',
            'menu_parent_id' => '',
            'page_id' => 'required',
        ]);

        $request->request->add(['menu_parent_id' => empty($request['menu_parent_id']) ? 0 : $request['menu_parent_id']]);

        $menu = $this->menuRepository->create($request->all());


        return redirect()->route('beheer.menus.index')->with('success', 'Menu is successvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $menus = Menu::where('menu_parent_id', '=', 0)->get();
        return view('menu.dynamicMenu',compact('menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
