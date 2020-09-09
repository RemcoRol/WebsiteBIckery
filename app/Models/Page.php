<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getRedirectUrl() {
        return $this->page_slug;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_name', 'page_meta_title', 'page_meta_description', 'page_slug', 'page_hidden'
    ];
}
