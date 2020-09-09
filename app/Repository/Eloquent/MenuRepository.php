<?php

namespace App\Repository\Eloquent;

use App\Models\Menu;
use App\Repository\MenuRepositoryInterface;
use Illuminate\Support\Collection;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
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
     * @return Menu
     */
    public function get($menu)
    {
        return Menu::findOrFail($menu);
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($menu)
    {
        Menu::destroy($menu);
    }
}
