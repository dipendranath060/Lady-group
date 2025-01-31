<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentMembers extends Model
{
    use HasFactory;
    protected $table ='current_members';
    protected $fillable = [
        'name',
        'image',
        'designation',
    ];
}
