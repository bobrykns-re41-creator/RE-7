@extends('layouts.app')
@section('title', 'Каталог вінілу | Vinyl Groove')
@section('content')
    <div style="background: #1a1a1a; padding: 30px; border-radius: 8px; color: #fff;">
        <h1 style="color: #d4af37; border-bottom: 1px solid #333; padding-bottom: 10px;">Каталог платівок</h1>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <a href="{{ route('vinyls.create') }}" style="background: #d4af37; color: #1a1a1a; padding: 10px 20px; text-decoration: none; font-weight: bold; border-radius: 4px;">+ Додати платівку</a>

            <form method="GET" action="{{ route('vinyls.index') }}" style="display: flex; gap: 10px;">
                <select name="genre" style="padding: 8px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px;">
                    <option value="">Всі жанри</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                    @endforeach
                </select>
                <button type="submit" style="background: #555; color: #fff; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Фільтрувати</button>
            </form>
        </div>

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
            <tr style="background: #333; color: #d4af37; text-align: left;">
                <th style="padding: 12px; border-bottom: 2px solid #555;">Виконавець</th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">Альбом</th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">Жанр</th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">Ціна (₴)</th>
                <th style="padding: 12px; border-bottom: 2px solid #555;">Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($vinyls as $vinyl)
                <tr style="border-bottom: 1px solid #333;">
                    <td style="padding: 12px;">{{ $vinyl->artist }}</td>
                    <td style="padding: 12px;"><strong>{{ $vinyl->title }}</strong></td>
                    <td style="padding: 12px;">{{ $vinyl->genre }}</td>
                    <td style="padding: 12px;">{{ number_format($vinyl->price, 2, ',', ' ') }}</td>
                    <td style="padding: 12px; display: flex; gap: 10px;">
                        <a href="{{ route('vinyls.show', $vinyl) }}" style="color: #4CAF50; text-decoration: none;">Огляд</a>
                        <a href="{{ route('vinyls.edit', $vinyl) }}" style="color: #2196F3; text-decoration: none;">Редагувати</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding: 20px; text-align: center; color: #aaa;">Платівок не знайдено.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div>
            {{ $vinyls->links() }}
        </div>
    </div>
@endsection
