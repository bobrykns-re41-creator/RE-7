<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;
use App\Http\Requests\VinylRequest;
use Illuminate\Http\Request;

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
        return view('vinyls.create');
    }

    public function store(VinylRequest $request)
    {
        Vinyl::create($request->validated());
        return redirect()->route('vinyls.index');
    }

    public function show(Vinyl $vinyl)
    {
        return view('vinyls.show', compact('vinyl'));
    }

    public function edit(Vinyl $vinyl)
    {
        return view('vinyls.edit', compact('vinyl'));
    }

    public function update(VinylRequest $request, Vinyl $vinyl)
    {
        $vinyl->update($request->validated());
        return redirect()->route('vinyls.index');
    }

    public function destroy(Vinyl $vinyl)
    {
        $vinyl->delete();
        return redirect()->route('vinyls.index');
    }
}
