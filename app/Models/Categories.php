<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'name',
        'is_active'
    ];


    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category', 'category_id', 'blog_id');
    }
}
