<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function merken()
    {
    	return $this->hasMany(Brand::class);
    }
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'category_name', 'category_type', 'category_hidden'
    ];
}
