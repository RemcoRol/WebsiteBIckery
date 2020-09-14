<?php
namespace App\Repository;

use App\Models\Brand;
use Illuminate\Support\Collection;

interface BrandRepositoryInterface
{
   public function all(): Collection;

   /**
     * Deletes a post.
     *
     * @param int
     */
  public function delete($brand_id);

  /**
    * Get's a post by it's ID
    *
    * @param int
    */
  public function get($brand_id);

    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function orderBy($orderBy);

    public function create(array $all);
}
