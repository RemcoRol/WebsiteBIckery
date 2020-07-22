<?php

namespace App\Repository\Eloquent;

use App\Models\Brand;
use App\Repository\BrandRepositoryInterface;
use Illuminate\Support\Collection;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
   /**
    * BrandRepository constructor.
    *
    * @param Brand $model
    */
   public function __construct(Brand $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();
   }

   /**
     * Get's a post by it's ID
     *
     * @param int
     * @return Brand
     */
    public function get($brand_id)
    {
        return Brand::findOrFail($brand_id);
    }

    /**
    * Deletes a post.
    *
    * @param int
    */
   public function delete($brand_id)
   {
       Brand::destroy($brand_id);
   }
}
