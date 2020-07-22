<?php
namespace App\Repository;

use App\Models\Categories;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
   public function all(): Collection;

   /**
     * Deletes a post.
     *
     * @param int
     */
  public function delete($category_id);

  /**
    * Get's a post by it's ID
    *
    * @param int
    */
  public function get($category_id);
}
