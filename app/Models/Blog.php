<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Can;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'image',
        'description',
        'meta_title',
        'meta_description',
        'image_alt',
        'featured_image',
        'blog_slug',
        'category_id',
    ];



    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
