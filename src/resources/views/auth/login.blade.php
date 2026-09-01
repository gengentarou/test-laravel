@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-nav')
    <form action="/register" method="get">
        <button type="submit">Register</button>
    </form>
@endsection

@section('content')

<div class="login_content">

    <div class="section__title">
        <h2>Login</h2>
    </div>

    <!-- ログインフォーム -->
    <form class="login-form" action="/login" method="post">
        @csrf

        <!-- メールアドレス -->
        <div class="login-form__email">
            <label for="email">メールアドレス</label>

            <input
                class="login-form__email-input"
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
        <div class="login-form__password">
            <label for="password">パスワード</label>

            <input
                class="login-form__password-input"
                type="password"
                id="password"
                name="password"
                placeholder="パスワードを入力してください"
            >

            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- ログインボタン -->
        <div class="login-form__button">
            <button
                class="login-form__button-submit"
                type="submit"
            >
                ログイン
            </button>
        </div>

    </form>

</div>

@endsection