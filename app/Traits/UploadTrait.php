<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadTrait
{
    public function uploadGlobalImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        // Paths
        $large_photos_storage = public_path('images/site/global/large_photos/');
        $medium_photos_storage = public_path('images/site/global/medium_photos/');
        $mobile_photos_storage = public_path('images/site/global/mobile_photos/');
        $tiny_photos_storage = public_path('images/site/global/tiny_photos/');


        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        $image = Image::make($file);

        $image
            ->resize(860, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save($large_photos_storage.$name. '.' .$uploadedFile->getClientOriginalExtension(),85)
            ->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($medium_photos_storage.$name. '.' .$uploadedFile->getClientOriginalExtension(),85)
            ->resize(420, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($mobile_photos_storage.$name. '.' .$uploadedFile->getClientOriginalExtension(),85)
            ->resize(10, null, function ($constraint) {
                $constraint->aspectRatio();
            })->blur(1)->save($tiny_photos_storage.$name. '.' .$uploadedFile->getClientOriginalExtension(),85);
        return $file;
    }

    public function uploadBrandImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        // Paths
        $logo_photos_storage = public_path('images/site/brands/logo/');
        $large_photos_storage = public_path('images/site/brands/large_photos/');
        $medium_photos_storage = public_path('images/site/brands/medium_photos/');
        $mobile_photos_storage = public_path('images/site/brands/mobile_photos/');
        $tiny_photos_storage = public_path('images/site/brands/tiny_photos/');


        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        $image = Image::make($file);

        $image
            ->resize(860, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save($large_photos_storage.$name. '.' .$uploadedFile->getClientOriginalExtension(),85)
            ->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($medium_photos_storage.$name. '.' .$uploadedFile->getClientOriginalExtension(),85)
            ->resize(420, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($mobile_photos_storage.$name. '.' .$uploadedFile->getClientOriginalExtension(),85)
            ->resize(10, null, function ($constraint) {
                $constraint->aspectRatio();
            })->blur(1)->save($tiny_photos_storage.$name. '.' .$uploadedFile->getClientOriginalExtension(),85);
        return $file;
    }


    public function uploadPackShot(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
        return $file;
    }
}
