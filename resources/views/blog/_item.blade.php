<article class="blog-card">
    <figure class="blog-card-thumbnail">
        <a href="{{ route('blog.show', $blog) }}">
            <img
                src="{{ asset('images/blog-placeholder.jpg') }}"
                alt="Обкладинка: {{ $blog->title }}"
                class="blog-card-image"
            >
        </a>
        <figcaption class="blog-category-badge">
            {{ $blog->category?->category_name ?? 'Без категорії' }}
        </figcaption>
    </figure>

    <div class="blog-card-body">
        <header>
            <h3 class="blog-title">
                <a href="{{ route('blog.show', $blog) }}">
                    {{ $blog->title }}
                </a>
            </h3>
            <div class="blog-meta">
                <span class="blog-author">
                    <svg
                        width="14"
                        height="14"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    {{ $blog->author?->name ?? 'Редакція' }}
                </span>
                <time class="blog-date" datetime="{{ $blog->dt_created->toIso8601String() }}">
                    <svg
                        width="14"
                        height="14"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    {{ $blog->dt_created->format('d.m.Y') }}
                </time>
            </div>
        </header>

        <p class="blog-excerpt">
            {{ \Illuminate\Support\Str::limit($blog->description, 120) }}
        </p>

        <footer class="blog-card-footer">
            <a href="{{ route('blog.show', $blog) }}" class="blog-read-more">
                Читати далі <span>&rarr;</span>
            </a>
        </footer>
    </div>
</article>
