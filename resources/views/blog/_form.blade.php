<style>
    .blog-form {
        max-width: 480px;
        margin: 0 auto 20px;
        text-align: left;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }
    .blog-form .field {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    .blog-form label {
        font-weight: 600;
        font-size: 14px;
    }
    .blog-form input[type="text"],
    .blog-form select,
    .blog-form textarea {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font: inherit;
        box-sizing: border-box;
    }
    .blog-form textarea {
        min-height: 80px;
        resize: vertical;
    }
    .blog-form .select2-container {
        width: 100% !important;
    }
    .blog-form .error {
        color: #d32f2f;
        font-size: 13px;
        margin: 0;
    }
</style>

<div class="blog-form">
    <div class="field">
        <label for="category_id">Категорія</label>
        <select id="category_id" name="category_id">
            <option value="">- Без категорії -</option>
            @foreach ($categories as $id => $name)
                <option
                    value="{{ $id }}"
                    @selected(old('category_id', $blog->category_id ?? '') == $id)
                >
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label for="title">Заголовок</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $blog->title ?? '') }}"
        >
        @error('title')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label for="description">Короткий опис</label>
        <textarea id="description" name="description">{{ old('description', $blog->description ?? '') }}</textarea>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label for="text">Повний текст</label>
        <textarea id="text" name="text">{{ old('text', $blog->text ?? '') }}</textarea>
        @error('text')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label for="filters">Мітки</label>
        <select id="filters" name="filters[]" multiple>
            @foreach ($filters as $id => $name)
                <option
                    value="{{ $id }}"
                    @selected(in_array($id, old('filters', $selected ?? [])))
                >
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('filters')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
</div>
