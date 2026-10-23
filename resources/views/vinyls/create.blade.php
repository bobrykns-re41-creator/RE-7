@extends('layouts.app')
@section('title', 'Додати вініл')
@section('content')
    <div style="max-width: 600px; margin: 0 auto; background: #1a1a1a; padding: 30px; border-radius: 8px; color: #fff;">
        <h1 style="color: #d4af37; border-bottom: 1px solid #333; padding-bottom: 10px;">Додати нову платівку</h1>

        <form method="POST" action="{{ route('vinyls.store') }}">
            @csrf
            @include('vinyls._form')

            <button type="submit" style="width: 100%; padding: 12px; background: #d4af37; color: #1a1a1a; font-weight: bold; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                Зберегти в каталог
            </button>
        </form>
    </div>
@endsection
