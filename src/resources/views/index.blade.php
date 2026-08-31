@extends('layouts.app')

@section('content')
<div class="contact_content">
    <div class="section__title">
        <h2>Contact</h2>
    </div>

    <form class="contact-form" action="/confirm" method="post">
        @csrf
        <!-- お名前 -->
        <div class="contact-form__name">
            <label>お名前※</label>

            <input class="contact-form__last-name"
                type="text"
                name="last_name"
                placeholder="例：山田"
            >
            <input class="contact-form__first-name"
                type="text"
                name="first_name"
                placeholder="例：太郎"
            >
        </div>

        <!-- 性別 -->
        <div class="contact-form__gender">
            <label>性別※</label>

            <label>
                <input class="contact-form__gender-man"
                    type="radio"
                    name="gender"
                    value="1"
                >
                男性
            </label>

            <label>
                <input class="contact-form__gender-women"
                    type="radio"
                    name="gender"
                    value="2"
                >
                女性
            </label>

            <label>
                <input class="contact-form__gender-another"
                    type="radio"
                    name="gender"
                    value="3"
                >
                その他
            </label>
        </div>

        <!-- メールアドレス -->
        <div class="contact-form__mail">
            <label for="email">メールアドレス※</label>

            <input class="contact-form__mail-input"
                type="email"
                id="email"
                name="email"
                placeholder="例：test@example.com"
            >
        </div>

        <!-- 電話番号 -->
        <div class="contact-form__tel">
            <label for="tel">電話番号※</label>

            <input class="contact-form__tel-first"
            type="text"
            name="tel_first"
            placeholder="080"
            >
            -
            <input class="contact-form__tel-second"
                type="text"
                name="tel_second"
                placeholder="1234"
            >
            -
            <input class="contact-form__tel-third"
                type="text"
                name="tel_third"
                placeholder="5678"
            >
        </div>

            <!-- 住所 -->
        <div class="contact-form__address">
            <label for="address">住所※</label>

            <input class="contact-form__address-input"
            type="text"
            id="address"
            name="address"
            placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"
            >
        </div>

        <!-- 建物名 -->
        <div class="contact-form__building">
            <label for="building">建物名</label>

            <input class="contact-form__building-input"
                type="text"
                id="building"
                name="building"
                placeholder="例：千駄ヶ谷マンション101"
            >
        </div>

        <!-- お問い合わせの種類 -->
        <div class="contact-form__category">
            <label for="category_id">お問い合わせの種類※</label>

            <select class="contact-form__category-select"
            id="category_id"
            name="category_id">
                <option value="" disabled selected>選択してください</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="contact-form__detail">
            <label for="detail">お問い合わせ内容※</label>

            <textarea class="contact-form__detail-input"
                id="detail"
                name="detail"
                placeholder="お問い合わせ内容をご記載ください"
            ></textarea>
        </div>

        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">確認画面</button>
        </div>

    </form>

</div>


@endsection
