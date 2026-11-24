@extends('layouts.app')
@section('title', 'Адміністрування блогу')
@section('content')
    <h1>Адміністрування блогу</h1>
    <p>
        <a href="{{ route('blog.create') }}">
            Додати запис
        </a>
    </p>
    @php
        $currentSort = request('sort');

        $sortUrl = fn (string $field) => route('blog.admin', array_merge(
            request()->except('sort', 'page'),
            ['sort' => $currentSort === $field ? '-' . $field : $field]
        ));

        $sortArrow = fn (string $field) => match ($currentSort) {
            $field => '↑',
            '-' . $field => '↓',
            default => '',
        };
    @endphp
    <form method="GET" action="{{ route('blog.admin') }}" style="display: flex; flex-wrap: wrap; gap: 10px; align-items: flex-end; margin-bottom: 20px;">
        <div>
            <label for="title">Заголовок</label><br>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ request('title') }}"
                placeholder="Пошук за заголовком"
            >
        </div>

        <div>
            <label for="categoryName">Назва категорії</label><br>
            <input
                type="text"
                id="categoryName"
                name="categoryName"
                value="{{ request('categoryName') }}"
                placeholder="Назва категорії"
            >
        </div>

        <div>
            <label for="category_id">Категорія</label><br>
            <select id="category_id" name="category_id" onchange="this.form.submit()">
                <option value="">Усі категорії</option>
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" @selected(request('category_id') == $id)>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="filter_id">Мітка</label><br>
            <select id="filter_id" name="filter_id" onchange="this.form.submit()">
                <option value="">Усі мітки</option>
                @foreach ($filters as $id => $name)
                    <option value="{{ $id }}" @selected(request('filter_id') == $id)>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="sort" value="{{ request('sort') }}">

        <button type="submit">Застосувати</button>
        <a href="{{ route('blog.admin') }}">Скинути фільтри</a>
    </form>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>
                <a href="{{ $sortUrl('title') }}">
                    Заголовок {{ $sortArrow('title') }}
                </a>
            </th>
            <th>
                <a href="{{ $sortUrl('categoryName') }}">
                    Категорія {{ $sortArrow('categoryName') }}
                </a>
            </th>
            <th>Мітки</th>
            <th>
                <a href="{{ $sortUrl('created') }}">
                    Створено {{ $sortArrow('created') }}
                </a>
            </th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($blogs as $i => $blog)
            <tr>
                <td>{{ $blogs->firstItem() + $i }}</td>
                <td>
                    <a href="{{ route('blog.show', $blog) }}">
                        {{ $blog->title }}
                    </a>
                </td>
                <td>
                    {{ $blog->category?->category_name ?? '—' }}
                </td>
                <td>
                    @forelse ($blog->filters as $filter)
                        <span class="tag">
                            {{ $filter->filter_name }}
                        </span>
                    @empty
                        —
                    @endforelse
                </td>
                <td>
                    {{ $blog->dt_created->format('d.m.Y') }}
                </td>
                <td>
                    <a href="{{ route('blog.edit', $blog) }}">
                        Редагувати
                    </a>
                    <form method="POST"
                          action="{{ route('blog.destroy', $blog) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Записів немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $blogs->links() }}
@endsection
