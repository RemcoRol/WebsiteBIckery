<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

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

    public function uploadBrandLogo(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);
        // Paths
        $logo_photos_storage = public_path('images/site/brands/' . $name . '/logo/');

        if (! File::exists($logo_photos_storage)) {
            File::makeDirectory($logo_photos_storage);
        }

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        $image = Image::make($file);

        $image
            ->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($logo_photos_storage.$name. '_logo.' .$uploadedFile->getClientOriginalExtension(),85);
        return $file;
    }

    public function uploadBrandImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        // Paths
        $large_photos_storage = public_path('images/site/brands/' . $name . '/large_photos/');
        $medium_photos_storage = public_path('images/site/brands/' . $name . '/medium_photos/');
        $mobile_photos_storage = public_path('images/site/brands/' . $name . '/mobile_photos/');
        $tiny_photos_storage = public_path('images/site/brands/' . $name . '/tiny_photos/');

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        if (! File::exists($large_photos_storage)) {
            File::makeDirectory($large_photos_storage);
        }
        if (! File::exists($medium_photos_storage)) {
            File::makeDirectory($medium_photos_storage);
        }
        if (! File::exists($mobile_photos_storage)) {
            File::makeDirectory($mobile_photos_storage);
        }
        if (! File::exists($tiny_photos_storage)) {
            File::makeDirectory($tiny_photos_storage);
        }

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
