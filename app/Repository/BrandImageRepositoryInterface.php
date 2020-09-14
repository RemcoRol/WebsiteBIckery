<?php
namespace App\Repository;

use App\Models\BrandImage;
use Illuminate\Support\Collection;

interface BrandImageRepositoryInterface
{
   public function all(): Collection;

   /**
     * Deletes a post.
     *
     * @param int
     */
  public function delete($brand_image_id);

  /**
    * Get's a post by it's ID
    *
    * @param int
    */
  public function get($brand_image_id);

  public function create(array $array);
}
