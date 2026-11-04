<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vinyl extends Model
{
    protected $fillable = ['title', 'artist', 'genre', 'year', 'price'];
}
