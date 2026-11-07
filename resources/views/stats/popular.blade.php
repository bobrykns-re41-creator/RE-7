@extends('layouts.app')
@section('title', 'Популярні платівки')

@section('content')
    <h1>Топ-10 найпопулярніших платівок</h1>

    <p><a href="{{ route('stats.pages') }}">← Повернутися до загальної статистики</a></p>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
        <tr style="background: #333; color: #d4af37;">
            <th>Посилання на товар</th>
            <th>Кількість переглядів</th>
            <th>Унікальних відвідувачів</th>
            <th>Останній перегляд</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($popular as $row)
            <tr>
                <td>
                    <a href="{{ url($row->page) }}" target="_blank">Переглянути платівку ({{ $row->page }})</a>
                </td>
                <td style="font-weight: bold;">{{ $row->hits }}</td>
                <td>{{ $row->unique_visitors }}</td>
                <td>{{ $row->last_visit }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align: center;">Статистика переглядів платівок ще порожня.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
