<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    protected $table = 'genres';
    protected $primaryKey = 'genre_id';
    public $timestamps = false;

    protected $fillable = ['name', 'description'];

    public function vinyls(): BelongsToMany
    {
        return $this->belongsToMany(
            Vinyl::class,
            'genre_vinyl',
            'genre_id',
            'vinyl_id'
        );
    }
}
