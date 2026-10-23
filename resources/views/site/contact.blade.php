@extends('layouts.app')

@section('title', 'Зворотний зв\'язок | Vinyl Groove')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; text-align: left; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <h1 style="text-align: center; color: #1a1a1a;">Зв'яжіться з нами</h1>

        <p style="text-align: center; color: #d4af37; font-weight: bold;">{{ $promoText }}</p>

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Ваше ім'я</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                @error('name')
                <p style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                @error('email')
                <p style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label for="phone" style="display: block; font-weight: bold; margin-bottom: 5px;">Телефон</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+380XXXXXXXXX" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                @error('phone')
                <p style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label for="budget" style="display: block; font-weight: bold; margin-bottom: 5px;">Орієнтовний бюджет (грн, необов'язково)</label>
                <input type="number" id="budget" name="budget" value="{{ old('budget') }}" placeholder="Наприклад, 1500" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                @error('budget')
                <p style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="message" style="display: block; font-weight: bold; margin-bottom: 5px;">Яку платівку ви шукаєте?</label>
                <textarea id="message" name="message" rows="5" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">{{ old('message') }}</textarea>
                @error('message')
                <p style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" style="width: 100%; padding: 12px; background-color: #1a1a1a; color: #d4af37; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer;">
                Надіслати запит
            </button>
        </form>
    </div>
@endsection
