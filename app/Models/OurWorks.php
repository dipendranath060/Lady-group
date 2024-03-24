<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWorks extends Model
{
    use HasFactory;
    protected $table = 'our_works';
    protected $fillable = [
        'title',
        'date',
        'description',
        'image',
        'work_slug',
        'meta_description'
    ];
}
