<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;
use App\Http\Requests\VinylRequest;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Arr;

class VinylController extends Controller
{
    public function index(Request $request)
    {
        $query = Vinyl::query();

        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        // зберігає параметр фільтру при переході між сторінками
        $vinyls = $query->orderBy('artist')->paginate(5)->withQueryString();

        // отримуємо унікальні жанри для випадаючого списку фільтра
        $genres = Vinyl::select('genre')->distinct()->pluck('genre');

        return view('vinyls.index', compact('vinyls', 'genres'));
    }

    public function create()
    {
        return view('vinyls.create', [
            'genres' => Genre::orderBy('name')->pluck('name', 'genre_id'),
            'selected' => [],
        ]);
    }

    public function store(VinylRequest $request)
    {
        $data = $request->validated();

        $vinyl = Vinyl::create(Arr::except($data, ['genres']));
        $vinyl->genres()->sync($data['genres'] ?? []);

        return redirect()->route('vinyls.show', $vinyl);
    }

    public function show(Vinyl $vinyl)
    {
        $vinyl->load(['translations', 'genres'])->loadCount('genres');

        return view('vinyls.show', compact('vinyl'));
    }

    public function edit(Vinyl $vinyl)
    {
        $vinyl->load('genres');

        return view('vinyls.edit', [
            'vinyl' => $vinyl,
            'genres' => Genre::orderBy('name')->pluck('name', 'genre_id'),
            'selected' => $vinyl->genres->pluck('genre_id')->all(),
        ]);
    }

    public function update(VinylRequest $request, Vinyl $vinyl)
    {
        $data = $request->validated();

        $vinyl->update(Arr::except($data, ['genres']));
        $vinyl->genres()->sync($data['genres'] ?? []);

        return redirect()->route('vinyls.show', $vinyl);
    }

    public function destroy(Vinyl $vinyl)
    {
        $vinyl->delete();
        return redirect()->route('vinyls.index');
    }
}
