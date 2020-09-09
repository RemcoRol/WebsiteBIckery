<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

  public function categories()
  {
  	return $this->belongsTo(Categories::class);
  }

  public function products()
  {
  	return $this->hasMany(Product::class);
  }

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'brand_name', 'categories_id', 'brand_hidden'
  ];
}
