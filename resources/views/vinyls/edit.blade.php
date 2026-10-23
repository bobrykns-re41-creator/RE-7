@extends('layouts.app')
@section('title', 'Редагувати | ' . $vinyl->title)
@section('content')
    <div style="max-width: 600px; margin: 0 auto; background: #1a1a1a; padding: 30px; border-radius: 8px; color: #fff;">
        <h1 style="color: #d4af37; border-bottom: 1px solid #333; padding-bottom: 10px;">Редагувати платівку</h1>

        <form method="POST" action="{{ route('vinyls.update', $vinyl) }}">
            @csrf
            @method('PUT')
            @include('vinyls._form')

            <button type="submit" style="width: 100%; padding: 12px; background: #2196F3; color: #fff; font-weight: bold; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                Оновити дані
            </button>
        </form>
    </div>
@endsection
