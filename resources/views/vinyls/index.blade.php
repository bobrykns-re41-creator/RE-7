@extends('layouts.app')
@section('title', 'Каталог вінілу | Vinyl Groove')
@section('content')
    @php
        $currentSort = request('sort');
        $sortUrl = fn (string $field) => route('vinyls.index', array_merge(
            request()->except('sort', 'page'),
            ['sort' => $currentSort === $field ? '-' . $field : $field]
        ));
        $sortArrow = fn (string $field) => match ($currentSort) {
            $field => '↑',
            '-' . $field => '↓',
            default => '',
        };
    @endphp

    <div style="background: #1a1a1a; padding: 30px; border-radius: 8px; color: #fff; text-align: left;">
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #333; padding-bottom: 15px; margin-bottom: 20px;">
            <h1 style="color: #d4af37; margin: 0;">Каталог платівок</h1>
            <a href="{{ route('vinyls.create') }}" style="background: #d4af37; color: #1a1a1a; padding: 10px 20px; text-decoration: none; font-weight: bold; border-radius: 4px;">+ Додати платівку</a>
        </div>

        <form method="GET" action="{{ route('vinyls.index') }}" style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center; margin-bottom: 20px;">
            <input type="text" name="artist" value="{{ request('artist') }}" placeholder="Виконавець" style="padding: 8px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px;">
            <input type="text" name="title" value="{{ request('title') }}" placeholder="Альбом" style="padding: 8px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px;">
            <input type="text" name="genreName" value="{{ request('genreName') }}" placeholder="Пошук за піджанром" style="padding: 8px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px;">

            <select name="genre" onchange="this.form.submit()" style="padding: 8px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px;">
                <option value="">Всі жанри</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" @selected(request('genre') == $genre)>{{ $genre }}</option>
                @endforeach
            </select>

            <select name="genre_id" onchange="this.form.submit()" style="padding: 8px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px;">
                <option value="">Усі піджанри</option>
                @foreach($subgenres as $id => $name)
                    <option value="{{ $id }}" @selected(request('genre_id') == $id)>{{ $name }}</option>
                @endforeach
            </select>

            <input type="hidden" name="sort" value="{{ request('sort') }}">

            <button type="submit" style="background: #555; color: #fff; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Фільтрувати</button>
            <a href="{{ route('vinyls.index') }}" style="color: #aaa; text-decoration: none; padding: 8px;">Скинути</a>
        </form>

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
            <tr style="background: #333; color: #d4af37; text-align: left;">
                <th style="padding: 12px; border-bottom: 2px solid #555;">
                    <a href="{{ $sortUrl('artist') }}" style="color: #d4af37; text-decoration: none;">Виконавець {{ $sortArrow('artist') }}</a>
                </th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">
                    <a href="{{ $sortUrl('title') }}" style="color: #d4af37; text-decoration: none;">Альбом {{ $sortArrow('title') }}</a>
                </th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">Жанр</th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">
                    <a href="{{ $sortUrl('subgenre') }}" style="color: #d4af37; text-decoration: none;">Піджанри {{ $sortArrow('subgenre') }}</a>
                </th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">
                    <a href="{{ $sortUrl('price') }}" style="color: #d4af37; text-decoration: none;">Ціна (₴) {{ $sortArrow('price') }}</a>
                </th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($vinyls as $vinyl)
                <tr style="border-bottom: 1px solid #333;">
                    <td style="padding: 12px;">{{ $vinyl->artist }}</td>
                    <td style="padding: 12px;"><strong>{{ $vinyl->title }}</strong></td>
                    <td style="padding: 12px;">{{ $vinyl->genre }}</td>
                    <td style="padding: 12px;">
                        @forelse ($vinyl->genres as $g)
                            <span style="display: inline-block; background: #2a2a2a; color: #d4af37; border: 1px solid #555; padding: 2px 6px; border-radius: 4px; font-size: 12px; margin: 2px;">{{ $g->name }}</span>
                        @empty
                            <span style="color: #777;">—</span>
                        @endforelse
                    </td>
                    <td style="padding: 12px;">{{ number_format($vinyl->price, 2, ',', ' ') }}</td>
                    <td style="padding: 12px; display: flex; gap: 10px;">
                        <a href="{{ route('vinyls.show', $vinyl) }}" style="color: #4CAF50; text-decoration: none;">Огляд</a>
                        <a href="{{ route('vinyls.edit', $vinyl) }}" style="color: #2196F3; text-decoration: none;">Редагувати</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="padding: 20px; text-align: center; color: #aaa;">Платівок не знайдено.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div>
            {{ $vinyls->links() }}
        </div>
    </div>
@endsection
