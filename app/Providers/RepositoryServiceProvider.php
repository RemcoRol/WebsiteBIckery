<?php

namespace App\Providers;

use App\Repository\EloquentRepositoryInterface;
use App\Repository\BrandRepositoryInterface;
use App\Repository\BrandImageRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\ImageRepositoryInterface;
use App\Repository\PageRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use App\Repository\ProductImageRepositoryInterface;
use App\Repository\MenuRepositoryInterface;

use App\Repository\Eloquent\BrandRepository;
use App\Repository\Eloquent\BrandImageRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\ProductRepository;
use App\Repository\Eloquent\ProductImageRepository;
use App\Repository\Eloquent\MenuRepository;
use App\Repository\Eloquent\ImageRepository;
use App\Repository\Eloquent\PageRepository;

use Illuminate\Support\ServiceProvider;

/**
* Class RepositoryServiceProvider
* @package App\Providers
*/
class RepositoryServiceProvider extends ServiceProvider
{
   /**
    * Register services.
    *
    * @return void
    */
   public function register()
   {
       $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
       $this->app->bind(BrandImageRepositoryInterface::class, BrandImageRepository::class);
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
       $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
       $this->app->bind(ProductImageRepositoryInterface::class, ProductImageRepository::class);
       $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
       $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
       $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
   }
}
