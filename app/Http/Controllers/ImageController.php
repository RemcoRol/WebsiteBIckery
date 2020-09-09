<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\ImageRepositoryInterface;
use App\Repository\PageRepositoryInterface;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    use UploadTrait;
    private $imageRepository;
    private $pageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository, PageRepositoryInterface  $pageRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->pageRepository = $pageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = $this->imageRepository->all();
        return view('beheer.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $pages = $this->pageRepository->all();
        return view('beheer.images.create', compact('pages'));
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
            'image_name' => 'required',
            'image_alt_text' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'page_id' => 'required'
        ]);

        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('image_name'));
            // Define folder path
            $folder = 'images/site/global/original/';
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
        return redirect()->route('beheer.images.index')->with('error', 'Afbeelding is niet toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->get($id);
        // Remove images from storage

        if(\File::exists($image->image_original_url)){
            \File::delete($image->image_original_url);
            \File::delete($image->image_large_url);
            \File::delete($image->image_medium_url);
            \File::delete($image->image_mobile_url);
            \File::delete($image->image_tiny_url);
        }
        // Remove model
        $image->delete();
        return redirect()->route('beheer.images.index')->with('message', 'Afbeelding is successvol verwijderd!');
    }
}
