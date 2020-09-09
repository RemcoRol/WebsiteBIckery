<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandImage extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_image_alt_text', 'brand_image_original_url', 'brand_image_large_url', 'brand_image_medium_url', 'brand_image_mobile_url', 'brand_image_tiny_url', 'brand_id'
    ];
}
