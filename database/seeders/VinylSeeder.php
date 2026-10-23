<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VinylSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('vinyls')->insert([
            ['title' => 'The Dark Side of the Moon', 'artist' => 'Pink Floyd', 'genre' => 'Progressive Rock', 'year' => 1973, 'price' => 1200, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Thriller', 'artist' => 'Michael Jackson', 'genre' => 'Pop', 'year' => 1982, 'price' => 950, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Kind of Blue', 'artist' => 'Miles Davis', 'genre' => 'Jazz', 'year' => 1959, 'price' => 1500, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Abbey Road', 'artist' => 'The Beatles', 'genre' => 'Rock', 'year' => 1969, 'price' => 1100, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Random Access Memories', 'artist' => 'Daft Punk', 'genre' => 'Electronic', 'year' => 2013, 'price' => 1800, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Rumours', 'artist' => 'Fleetwood Mac', 'genre' => 'Rock', 'year' => 1977, 'price' => 1050, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Nevermind', 'artist' => 'Nirvana', 'genre' => 'Grunge', 'year' => 1991, 'price' => 1300, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'A Night at the Opera', 'artist' => 'Queen', 'genre' => 'Rock', 'year' => 1975, 'price' => 1150, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'OK Computer', 'artist' => 'Radiohead', 'genre' => 'Alternative Rock', 'year' => 1997, 'price' => 1400, 'created_at' => $now, 'updated_at' => $now],
            ['title' => '21', 'artist' => 'Adele', 'genre' => 'Pop', 'year' => 2011, 'price' => 900, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
