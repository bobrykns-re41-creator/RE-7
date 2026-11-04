@extends('layouts.app')
@section('title', 'Статистика відвідувань')
@section('content')
    <h1>Статистика відвідувань</h1>
    <p style="margin-bottom: 15px;">
        <a href="{{ route('stats.pages', ['type' => 'page']) }}">За сторінками</a> |
        <a href="{{ route('stats.pages', ['type' => 'ip']) }}">За ІР-адресами</a> |
        <a href="{{ route('stats.pages', ['type' => 'user_agent']) }}">За пристроями</a> |
        <a href="{{ route('stats.popular') }}" style="color: #d4af37; font-weight: bold;">Популярні платівки</a>
    </p>
    <table>
        <thead>
        <tr>
            <th>{{ $type === 'page' ? 'Сторінка' : 'IP-адреса' }}</th>
            <th>Звернень</th>
            <th>Останній візит</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>
                    <a href="{{ route('stats.detail', [
 'type' => $type,
'item' => $row->{$type},
 ]) }}">
                        {{ $row->{$type} }}
                    </a>
                </td>
                <td>{{ $row->hits }}</td>
                <td>{{ $row->last_visit }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">
                    Даних ще немає.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
