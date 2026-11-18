<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Vinyl Groove | Магазин платівок')</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #1a1a1a;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            color: #d4af37;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
            margin-right: 30px;
            letter-spacing: 1px;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #d4af37;
        }

        main {
            flex: 1;
            padding: 50px 20px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            text-align: center;
        }

        footer {
            background-color: #1a1a1a;
            color: #999;
            text-align: center;
            padding: 30px 20px;
            border-top: 3px solid #d4af37;
            font-size: 14px;
        }

        .footer-content p {
            margin: 5px 0;
        }

        .footer-links {
            margin-top: 15px;
        }

        .footer-links a {
            color: #d4af37;
            text-decoration: none;
            margin: 0 15px;
            transition: opacity 0.3s;
        }

        .footer-links a:hover {
            opacity: 0.7;
        }

        /* Сітка карток */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        /* Сама картка (темна тема) */
        .blog-card {
            display: flex;
            flex-direction: column;
            background: #1e1e1e; /* Темний фон картки */
            border: 1px solid #333; /* Тонка рамка */
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            height: 100%;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            border-color: #d4af37; /* Золотий акцент при наведенні */
        }

        /* Зображення та бейдж категорії */
        .blog-card-thumbnail {
            position: relative;
            margin: 0;
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: #111; /* Заглушка, якщо фото вантажиться довго */
        }

        .blog-card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .blog-card:hover .blog-card-image {
            transform: scale(1.05); /* Легкий зум фото при наведенні */
        }

        /* Плашка категорії поверх фото */
        .blog-category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #d4af37; /* Золотий фірмовий колір */
            color: #111;
            padding: 6px 14px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
        }

        /* Тіло картки (текстова частина) */
        .blog-card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        /* Заголовок */
        .blog-title {
            margin: 0 0 12px 0;
            font-size: 1.3rem;
            line-height: 1.4;
        }

        .blog-title a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .blog-title a:hover {
            color: #d4af37;
        }

        /* Мета-дані (автор, дата) */
        .blog-meta {
            display: flex;
            gap: 15px;
            font-size: 0.85rem;
            color: #999999;
            margin-bottom: 15px;
            align-items: center;
        }

        .blog-meta svg {
            margin-right: 6px;
            vertical-align: -2px;
            color: #d4af37; /* Іконки золотим кольором */
        }

        /* Короткий опис */
        .blog-excerpt {
            color: #cccccc;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 24px;
            flex-grow: 1; /* Відштовхує кнопку завжди вниз */
        }

        /* Кнопка "Читати далі" */
        .blog-card-footer {
            margin-top: auto;
        }

        .blog-read-more {
            display: block;
            padding: 12px 20px;
            background: transparent;
            color: #d4af37;
            border: 1px solid #d4af37;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .blog-read-more:hover {
            background: #d4af37;
            color: #111;
        }

    </style>
</head>
<body>

<header>
    <a href="{{ url('/') }}" class="logo">Vinyl Groove</a>
    <nav>
        <a href="{{ url('/') }}">Головна</a>
        <a href="{{ route('vinyls.index') }}">Каталог вінілу</a>
        <a href="{{ url('/genres/rock') }}">Rock</a>
        <a href="{{ url('/genres/alternative-metal') }}">Alternative Metal</a>
        <a href="{{ url('/genres/post-grunge') }}">Post-Grunge</a>
        <a href="{{ url('/genres/synthwave') }}">Synthwave</a>
        <a href="{{ url('/genres/jazz') }}">Jazz</a>
        <a href="{{ url('/equipment') }}">Програвачі</a>
        <a href="{{ url('/contact') }}">Контакти</a>
        <a href="{{ route('country.index') }}">Країни</a>
        <a href="{{ route('stats.pages') }}">Статистика</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <div class="footer-content">
        <p>&copy; {{ date('Y') }} Інтернет-магазин вінілових платівок «Vinyl Groove».</p>
    </div>
    <div class="footer-links">
        <a href="#">Доставка та оплата</a>
        <a href="#">Догляд за вінілом</a>
        <a href="#">Політика конфіденційності</a>
    </div>
</footer>

</body>
</html>
