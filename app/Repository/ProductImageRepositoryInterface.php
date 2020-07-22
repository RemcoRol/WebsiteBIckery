<?php
namespace App\Repository;

use App\Models\ProductImage;
use Illuminate\Support\Collection;

interface ProductImageRepositoryInterface
{
   public function all(): Collection;

   /**
     * Deletes a post.
     *
     * @param int
     */
  public function delete($product_image_id);

  /**
    * Get's a post by it's ID
    *
    * @param int
    */
  public function get($product_image_id);
}
