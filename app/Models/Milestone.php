<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;
    protected $table = 'milestones';
    protected $fillable = [
        'title',
        'achievement'
    ];
}
