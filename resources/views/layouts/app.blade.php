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
    </style>
</head>
<body>

<header>
    <a href="{{ url('/') }}" class="logo">Vinyl Groove</a>
    <nav>
        <a href="{{ url('/') }}">Головна</a>
        <a href="{{ url('/catalog') }}">Усі платівки</a>
        <a href="{{ url('/genres/rock') }}">Rock</a>
        <a href="{{ url('/genres/alternative-metal') }}">Alternative Metal</a>
        <a href="{{ url('/genres/post-grunge') }}">Post-Grunge</a>
        <a href="{{ url('/genres/synthwave') }}">Synthwave</a>
        <a href="{{ url('/genres/jazz') }}">Jazz</a>
        <a href="{{ url('/equipment') }}">Програвачі</a>
        <a href="{{ url('/contact') }}">Контакти</a>
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
