<?php

namespace App\Repository\Eloquent;

use App\Models\ProductImage;
use App\Repository\ProductImageRepositoryInterface;
use Illuminate\Support\Collection;

class ProductImageRepository extends BaseRepository implements ProductImageRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param ProductImage $model
    */
   public function __construct(ProductImage $model)
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
    public function get($product_image_id)
    {
        return ProductImage::findOrFail($product_image_id);
    }

    /**
    * Deletes a post.
    *
    * @param int
    */
   public function delete($product_image_id)
   {
       ProductImage::destroy($product_image_id);
   }
}
