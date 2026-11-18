<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VinylTranslation extends Model
{
    protected $fillable = ['vinyl_id', 'locale', 'description'];
}
