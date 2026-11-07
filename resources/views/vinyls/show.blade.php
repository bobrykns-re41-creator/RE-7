@extends('layouts.app')
@section('title', $vinyl->title)
@section('content')
    <div style="max-width: 600px; margin: 0 auto; background: #1a1a1a; padding: 30px; border-radius: 8px; color: #fff; border: 1px solid #333;">

        <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
            <div style="background: #333; padding: 6px 12px; border-radius: 4px; display: flex; gap: 10px; align-items: center; border: 1px solid #555; font-size: 14px;">
                <span style="color: #aaa;">Мова:</span>
                <a href="{{ request()->fullUrlWithQuery(['lang' => 'uk']) }}" style="text-decoration: none; color: {{ request('lang', 'uk') == 'uk' ? '#d4af37' : '#fff' }}; font-weight: {{ request('lang', 'uk') == 'uk' ? 'bold' : 'normal' }};">УКР</a>
                <span style="color: #555;">|</span>
                <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" style="text-decoration: none; color: {{ request('lang') == 'en' ? '#d4af37' : '#fff' }}; font-weight: {{ request('lang') == 'en' ? 'bold' : 'normal' }};">ENG</a>
            </div>
        </div>

        <h1 style="color: #d4af37; margin-top: 0;">{{ $vinyl->title }}</h1>
        <h2 style="color: #aaa; margin-top: -10px;">{{ $vinyl->artist }}</h2>

        <div style="background: #333; padding: 20px; border-radius: 4px; margin-top: 20px;">
            <p style="margin-bottom: 10px;"><strong style="color: #d4af37;">Жанр:</strong> {{ $vinyl->genre }}</p>
            <p style="margin-bottom: 10px;"><strong style="color: #d4af37;">Рік випуску:</strong> {{ $vinyl->year }}</p>
            <p style="margin-bottom: 0;"><strong style="color: #d4af37;">Ціна:</strong> <span style="font-size: 1.2em; color: #4CAF50;">{{ number_format($vinyl->price, 2, ',', ' ') }} ₴</span></p>
        </div>

        <div style="background: #2a2a2a; padding: 20px; border-left: 4px solid #d4af37; border-radius: 4px; margin-top: 20px;">
            <h3 style="margin-top: 0; margin-bottom: 10px; color: #d4af37; font-size: 1.1em;">
                {{ request('lang') == 'en' ? 'Description' : 'Опис' }}
            </h3>
            <p style="line-height: 1.6; margin-bottom: 0; color: #eee;">
                {{ $vinyl->t('description') }}
            </p>
        </div>

        <div style="display: flex; gap: 15px; margin-top: 30px; align-items: center;">
            <a href="{{ route('vinyls.edit', $vinyl) }}" style="background: #2196F3; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">Редагувати</a>

            <form method="POST" action="{{ route('vinyls.destroy', $vinyl) }}" style="margin: 0;" onsubmit="return confirm('Дійсно видалити цю платівку?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: #ff5252; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; cursor: pointer;">Видалити</button>
            </form>

            <a href="{{ route('vinyls.index') }}" style="margin-left: auto; color: #aaa; text-decoration: none;">← Назад до каталогу</a>
        </div>
    </div>
@endsection
