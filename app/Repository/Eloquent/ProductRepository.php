<?php

namespace App\Repository\Eloquent;

use App\Models\Product;
use App\Repository\ProductRepositoryInterface;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param Product $model
    */
   public function __construct(Product $model)
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
     * @return Product
     */
    public function get($product_id)
    {
        return Product::findOrFail($product_id);
    }

    /**
    * Deletes a post.
    *
    * @param int
    */
   public function delete($product_id)
   {
       Product::destroy($product_id);
   }
}
