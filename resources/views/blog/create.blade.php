@extends('layouts.app')

@section('title', 'Створити запис')

@section('content')
    <h1>Створити запис</h1>

    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        @include('blog._form')

        <button type="submit">Зберегти</button>
    </form>
@endsection
