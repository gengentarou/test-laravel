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
                @if(isset($contact['last_name']))
                    value="{{ $contact['last_name'] }}"
                @endif
                placeholder="例：山田"
            >

            @error('last_name')
                <p>{{ $message }}</p>
            @enderror

            <input class="contact-form__first-name"
                type="text"
                name="first_name"
                @if(isset($contact['first_name']))
                    value="{{ $contact['first_name'] }}"
                @endif
                placeholder="例：太郎"
            >

            @error('first_name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- 性別 -->
        <div class="contact-form__gender">
            <label>性別※</label>

            <label>
                <input class="contact-form__gender-man"
                    type="radio"
                    name="gender"
                    value="1"
                    @if(isset($contact['gender']) && $contact['gender'] == 1)
                        checked
                    @endif
                >
                男性
            </label>

            <label>
                <input class="contact-form__gender-women"
                    type="radio"
                    name="gender"
                    value="2"
                    @if(isset($contact['gender']) && $contact['gender'] == 2)
                        checked
                    @endif
                >
                女性
            </label>

            <label>
                <input class="contact-form__gender-another"
                    type="radio"
                    name="gender"
                    value="3"
                    @if(isset($contact['gender']) && $contact['gender'] == 3)
                        checked
                    @endif
                >
                その他
            </label>

            @error('gender')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- メールアドレス -->
        <div class="contact-form__mail">
            <label for="email">メールアドレス※</label>

            <input class="contact-form__mail-input"
                type="email"
                id="email"
                name="email"
                @if(isset($contact['email']))
                    value="{{ $contact['email'] }}"
                @endif
                placeholder="例：test@example.com"
            >

            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- 電話番号 -->
        <div class="contact-form__tel">
            <label for="tel">電話番号※</label>

            <input class="contact-form__tel-first"
                type="text"
                name="tel_first"
                @if(isset($contact['tel_first']))
                    value="{{ $contact['tel_first'] }}"
                @endif
                placeholder="080"
            >
            -
            <input class="contact-form__tel-second"
                type="text"
                name="tel_second"
                @if(isset($contact['tel_second']))
                    value="{{ $contact['tel_second'] }}"
                @endif
                placeholder="1234"
            >
            -
            <input class="contact-form__tel-third"
                type="text"
                name="tel_third"
                @if(isset($contact['tel_third']))
                    value="{{ $contact['tel_third'] }}"
                @endif
                placeholder="5678"
            >

            @error('tel_first')
                <p>{{ $message }}</p>
            @enderror

            @error('tel_second')
                <p>{{ $message }}</p>
            @enderror

            @error('tel_third')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- 住所 -->
        <div class="contact-form__address">
            <label for="address">住所※</label>

            <input class="contact-form__address-input"
                type="text"
                id="address"
                name="address"
                @if(isset($contact['address']))
                    value="{{ $contact['address'] }}"
                @endif
                placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"
            >

            @error('address')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- 建物名 -->
        <div class="contact-form__building">
            <label for="building">建物名</label>

            <input class="contact-form__building-input"
                type="text"
                id="building"
                name="building"
                @if(isset($contact['building']))
                    value="{{ $contact['building'] }}"
                @endif
                placeholder="例：千駄ヶ谷マンション101"
            >
        </div>

        <!-- お問い合わせの種類 -->
        <div class="contact-form__category">
            <label for="category_id">お問い合わせの種類※</label>

            <select class="contact-form__category-select"
                id="category_id"
                name="category_id">

                <option value="" disabled
                    @if(!isset($contact['category_id']))
                        selected
                    @endif
                >
                    選択してください
                </option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if(isset($contact['category_id']) && $contact['category_id'] == $category->id)
                            selected
                        @endif
                    >
                        {{ $category->content }}
                    </option>
                @endforeach

            </select>

            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- お問い合わせ内容 -->
        <div class="contact-form__detail">
            <label for="detail">お問い合わせ内容※</label>

            <textarea class="contact-form__detail-input"
                id="detail"
                name="detail"
                placeholder="お問い合わせ内容をご記載ください"
            >@if(isset($contact['detail'])){{ $contact['detail'] }}@endif</textarea>

            @error('detail')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">
                確認画面
            </button>
        </div>

    </form>

</div>

@endsection
