<?php
namespace App\Repository;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
   public function all(): Collection;

   /**
     * Deletes a post.
     *
     * @param int
     */
  public function delete($product_id);

  /**
    * Get's a post by it's ID
    *
    * @param int
    */
  public function get($product_id);
}
