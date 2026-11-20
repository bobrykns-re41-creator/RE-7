<?php

namespace App\Queries;

use App\Models\Genre;
use App\Models\Vinyl;
use Illuminate\Database\Eloquent\Builder;

class VinylFilter
{
    private const SORTABLE = [
        'artist' => 'vinyls.artist',
        'title'  => 'vinyls.title',
        'price'  => 'vinyls.price',
    ];

    public function apply(array $input): Builder
    {
        $query = Vinyl::query()->with('genres');

        $query->when(
            $input['genre'] ?? null,
            fn (Builder $q, $value) => $q->where('vinyls.genre', $value)
        );

        $query->when(
            $input['artist'] ?? null,
            fn (Builder $q, $value) => $q->where('vinyls.artist', 'like', "%{$value}%")
        );

        $query->when(
            $input['title'] ?? null,
            fn (Builder $q, $value) => $q->where('vinyls.title', 'like', "%{$value}%")
        );

        $query->when(
            $input['genreName'] ?? null,
            fn (Builder $q, $value) => $q->whereHas(
                'genres',
                fn (Builder $related) => $related->where('genres.name', 'like', "%{$value}%")
            )
        );

        $query->when(
            $input['genre_id'] ?? null,
            fn (Builder $q, $value) => $q->whereHas(
                'genres',
                fn (Builder $related) => $related->whereKey($value)
            )
        );

        return $this->sort($query, $input['sort'] ?? null);
    }

    private function sort(Builder $query, ?string $sort): Builder
    {
        $desc = str_starts_with($sort ?? '', '-');
        $field = $desc ? substr($sort, 1) : $sort;
        $direction = $desc ? 'desc' : 'asc';

        if ($field === 'subgenre') {
            return $query
                ->orderBy(
                    Genre::select('genres.name')
                        ->join('genre_vinyl', 'genres.genre_id', '=', 'genre_vinyl.genre_id')
                        ->whereColumn('genre_vinyl.vinyl_id', 'vinyls.id')
                        ->orderBy('genres.name')
                        ->limit(1),
                    $direction
                )
                ->orderBy('vinyls.artist');
        }

        if (!$field || !isset(self::SORTABLE[$field])) {
            return $query->orderBy('vinyls.artist')->orderBy('vinyls.id');
        }

        return $query
            ->orderBy(self::SORTABLE[$field], $direction)
            ->orderBy('vinyls.id');
    }
}
