<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // the fillable property is used to specify which attributes can be mass assigned
    protected $fillable =
    [
        'title',
        'excerpt',
        'body'
    ];
}
