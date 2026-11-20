<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;
use App\Http\Requests\VinylRequest;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Arr;
use App\Queries\VinylFilter;

class VinylController extends Controller
{
    public function index(Request $request, VinylFilter $filter)
    {
        $input = $request->validate([
            'genre'     => ['nullable', 'string', 'max:100'],
            'artist'    => ['nullable', 'string', 'max:255'],
            'title'     => ['nullable', 'string', 'max:255'],
            'genreName' => ['nullable', 'string', 'max:100'],
            'genre_id'  => ['nullable', 'integer', 'exists:genres,genre_id'],
            'sort'      => ['nullable', 'string', 'max:30'],
        ]);

        $vinyls = $filter->apply($input)
            ->paginate(5)
            ->withQueryString();

        $genres = Vinyl::select('genre')->distinct()->pluck('genre');
        $subgenres = Genre::orderBy('name')->pluck('name', 'genre_id');

        return view('vinyls.index', compact('vinyls', 'genres', 'subgenres'));
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
