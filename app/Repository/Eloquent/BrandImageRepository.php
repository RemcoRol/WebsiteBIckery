<?php

namespace App\Repository\Eloquent;

use App\Models\BrandImage;
use App\Repository\BrandImageRepositoryInterface;
use Illuminate\Support\Collection;

class BrandImageRepository extends BaseRepository implements BrandImageRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param ProductImage $model
    */
   public function __construct(BrandImage $model)
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
     * @return ProductImage
     */
    public function get($brand_image_id)
    {
        return BrandImage::findOrFail($brand_image_id);
    }

    /**
    * Deletes a post.
    *
    * @param int
    */
   public function delete($brand_image_id)
   {
       BrandImage::destroy($brand_image_id);
   }
}
