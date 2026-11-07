@extends('layouts.app')

@section('title', 'Редагувати запис')

@section('content')
    <h1>Редагувати запис</h1>

    <form action="{{ route('blog.update', $blog) }}" method="POST">
        @csrf
        @method('PUT')
        @include('blog._form')

        <button type="submit">Оновити</button>
    </form>
@endsection
