@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <h1>{{ $blog->title }}</h1>

    <p class="meta">
        <strong>Категорія:</strong> {{ $blog->category?->category_name ?? 'Без категорії' }} |
        <strong>Автор:</strong> {{ $blog->author?->name ?? 'Редакція' }} |
        <strong>Дата:</strong> {{ $blog->dt_created->format('d.m.Y') }}
    </p>

    <div class="content">
        {{ $blog->text }}
    </div>

    <a href="{{ route('blog.edit', $blog) }}">Редагувати</a>

    <div class="tags">
        @forelse ($blog->filters as $filter)
            <span class="tag">
                {{ $filter->filter_name }}
            </span>
        @empty
            <span>Міток немає.</span>
        @endforelse
    </div>
@endsection
