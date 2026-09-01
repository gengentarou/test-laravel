@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-nav')
    <form action="/login" method="get">
        <button type="submit">Login</button>
    </form>
@endsection

@section('content')

<div class="register_content">

    <div class="section__title">
        <h2>Register</h2>
    </div>

    <form class="register-form" action="/register" method="post">
        @csrf

        <!-- お名前 -->
        <div class="register-form__name">
            <label for="name">お名前</label>

            <input
                class="register-form__name-input"
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="例：山田 太郎"
            >

            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- メールアドレス -->
        <div class="register-form__email">
            <label for="email">メールアドレス</label>

            <input
                class="register-form__email-input"
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="例：test@example.com"
            >

            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- パスワード -->
        <div class="register-form__password">
            <label for="password">パスワード</label>

            <input
                class="register-form__password-input"
                type="password"
                id="password"
                name="password"
                placeholder="例：coachtech1106"
            >

            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 登録ボタン -->
        <div class="register-form__button">
            <button
                class="register-form__button-submit"
                type="submit"
            >
                登録
            </button>
        </div>

    </form>

</div>

@endsection