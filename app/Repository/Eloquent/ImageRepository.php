<?php

namespace App\Repository\Eloquent;

use App\Models\Image;
use App\Repository\ImageRepositoryInterface;
use Illuminate\Support\Collection;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        parent::__construct($image);
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
     * @return Image
     */
    public function get($image)
    {
        return Image::findOrFail($image);
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($image)
    {
        Image::destroy($image);
    }
}
