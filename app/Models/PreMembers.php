<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreMembers extends Model
{
    use HasFactory;
    protected $table ='pre_members';
    protected $fillable = [
        'name',
        'image',
        'designation',
        'tenure',
    ];
}
