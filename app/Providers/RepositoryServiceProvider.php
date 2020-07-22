<?php

namespace App\Providers;

use App\Repository\EloquentRepositoryInterface;
use App\Repository\BrandRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use App\Repository\ProductImageRepositoryInterface;

use App\Repository\Eloquent\BrandRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\ProductRepository;
use App\Repository\Eloquent\ProductImageRepository;

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
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
       $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
       $this->app->bind(ProductImageRepositoryInterface::class, ProductImageRepository::class);
   }
}
