@extends('layouts.app')

@section('content')
<div class="confirm_content">
    <div class="section__title">
        <h2>Confirm</h2>
    </div>


    <div class="contact-form__name">
        <label>お名前</label>
        {{ $contact['last_name'] }}
        {{ $contact['first_name'] }}
    </div>

    <div class="contact-form__gender">
        <label>性別</label>
        @if($contact['gender'] == 1)
            男性
        @elseif($contact['gender'] == 2)
            女性
        @else
            その他
        @endif
    </div>

    <div class="contact-form__mail">
        <label>メールアドレス</label>
        {{ $contact['email'] }}
    </div>

    <div class="contact-form__tel">
        {{ $contact['tel'] }}
    </div>

    <div class="contact-form__address">
        {{ $contact['address'] }}
    </div>

    <div class="contact-form__building">
        {{ $contact['building'] }}
    </div>

    <div class="contact-form__category">
        {{ $category->content }}
    </div>

    <div class="contact-form__detail">
        {{ $contact['detail'] }}
    </div>

    <div class="contact-form__button">
        <form class="confirm-form" action="/thanks" method="post">
            @csrf
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="tel" value="{{ $contact['tel'] }}"> <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}">
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            <button
                class="confirm-form__button-submit"
                type="submit"
            >
            送信
            </button>
        </form>

        <form class="confirm-form" action="/" method="post">
            @csrf
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}">
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">

            <button
                class="confirm-form__button-edit"
                type="submit"
            >
            修正
            </button>
        </form>
    </div>

@endsection