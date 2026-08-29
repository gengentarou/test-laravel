@extends('layouts.app')

@section('content')


<h2>Contact</h2>

<form method="POST" action="/confirm">
    @csrf

    <!-- お名前 -->
    <div>
        <label>お名前※</label>

        <input
            type="text"
            name="first_name"
            placeholder="例：山田"
        >

        <input
            type="text"
            name="last_name"
            placeholder="例：太郎"
        >
    </div>

    <!-- 性別 -->
    <div>
        <label>性別※</label>

        <label>
            <input
                type="radio"
                name="gender"
                value="1"
            >
            男性
        </label>

        <label>
            <input
                type="radio"
                name="gender"
                value="2"
            >
            女性
        </label>

        <label>
            <input
                type="radio"
                name="gender"
                value="3"
            >
            その他
        </label>
    </div>

    <!-- メールアドレス -->
    <div>
        <label for="email">メールアドレス※</label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="例：test@example.com"
        >
    </div>

    <!-- 電話番号 -->
    <div>
        <label for="tel">電話番号※</label>

        <input
        type="text"
        name="tel_first"
        placeholder="080"
    >
    -
    <input
        type="text"
        name="tel_second"
        placeholder="1234"
    >
    -
    <input
        type="text"
        name="tel_third"
        placeholder="5678"
    >
    </div>

    <!-- 住所 -->
    <div>
        <label for="address">住所※</label>

        <input
            type="text"
            id="address"
            name="address"
            placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"
        >
    </div>

    <!-- 建物名 -->
    <div>
        <label for="building">建物名</label>

        <input
            type="text"
            id="building"
            name="building"
            placeholder="例：千駄ヶ谷マンション101"
        >
    </div>

    <!-- お問い合わせの種類 -->
    <div>
        <label for="category_id">お問い合わせの種類※</label>

        <select name="category_id" id="category_id">
            <option value="">選択してください</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- お問い合わせ内容 -->
    <div>
        <label for="detail">お問い合わせ内容※</label>

        <textarea
            id="detail"
            name="detail"
            placeholder="お問い合わせ内容をご記載ください"
        ></textarea>
    </div>

    <button type="submit">確認画面</button>

</form>


@endsection
