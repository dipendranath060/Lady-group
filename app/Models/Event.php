<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table ='events';
    protected $fillable = [
        'title',
        'start_date',
        'expiry_date',
        'description',
        'image',
        'event_slug',
        'venue'
    ];
}
