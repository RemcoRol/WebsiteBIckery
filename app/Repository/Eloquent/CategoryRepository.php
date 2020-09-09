<?php

namespace App\Repository\Eloquent;

use App\Models\Categories;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param Categories $model
    */
   public function __construct(Categories $model)
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
     * @return Categories
     */
    public function get($category_id)
    {
        return Categories::findOrFail($category_id);
    }

    public function getByName($categoryName)
    {
        $category = Categories::where('category_name', '=', $categoryName)->first();

        if ($category) return $category;

        abort(404);
    }

    /**
    * Deletes a post.
    *
    * @param int
    */
   public function delete($category_id)
   {
       Categories::destroy($category_id);
   }
}
