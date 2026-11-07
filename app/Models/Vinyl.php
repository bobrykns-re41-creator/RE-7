<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vinyl extends Model
{
    protected $fillable = ['title', 'artist', 'genre', 'year', 'price'];

    public function translations(): HasMany
    {
        return $this->hasMany(VinylTranslation::class);
    }

    public function t(string $field)
    {
        $locale = request()->query('lang', 'uk');

        if ($locale === 'uk') {
            return $this->{$field};
        }

        $translation = $this->translations->where('locale', $locale)->first();

        return $translation ? $translation->{$field} : $this->{$field};
    }
}
