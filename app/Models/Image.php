<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_name', 'image_alt_text', 'image_original_url', 'image_large_url', 'image_medium_url', 'image_mobile_url', 'image_tiny_url', 'page_id'
    ];
}
