<?php

namespace App\Repository\Eloquent;

use App\Models\Page;
use App\Repository\PageRepositoryInterface;
use Illuminate\Support\Collection;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        parent::__construct($page);
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
     * @return Page
     */
    public function get($page)
    {
        return Page::findOrFail($page);
    }

    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return Page
     */
    public function getBySlug($slug)
    {
        $pageExist = Page::where('page_slug', '=', $slug)->first();

        if ($pageExist) return $pageExist;

        abort(404);
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($page)
    {
        Page::destroy($page);
    }
}
