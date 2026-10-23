@extends('layouts.app')

@section('title', 'Запит прийнято | Vinyl Groove')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; text-align: center; background: #fff; padding: 40px 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <h1 style="color: #27ae60;">Дякуємо за звернення!</h1>
        <p style="font-size: 16px; margin-bottom: 20px;">Ваша заявка успішно передана менеджерам магазину.</p>

        <div style="background: #f8f9fa; padding: 20px; border-radius: 4px; text-align: left; display: inline-block; width: 100%; box-sizing: border-box;">
            <p><strong>Ім'я:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Телефон:</strong> {{ $phone }}</p>

            @if(isset($budget))
                <p><strong>Бюджет:</strong> {{ $budget }} грн</p>
            @endif

            <p><strong>Ваш запит:</strong> {{ $message }}</p>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('contact.form') }}" style="color: #1a1a1a; text-decoration: none; font-weight: bold; border-bottom: 2px solid #d4af37;">
                Написати ще одне повідомлення
            </a>
        </div>
    </div>
@endsection
