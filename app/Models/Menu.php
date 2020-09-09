<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function childs()
    {
        return $this->hasMany(Menu::class, 'menu_parent_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_title', 'menu_hidden', 'menu_parent_id', 'page_id'
    ];
}
