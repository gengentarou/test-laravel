@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-nav')
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection

@section('content')



    <div class="section__title">
        <h2>Admin</h2>
    </div>

<div class="admin-search">

    <form action="/admin" method="get">

        <!-- キーワード -->
        <div class="admin-search__keyword">
            <input
                type="text"
                name="keyword"
                value="{{ request('keyword') }}"
                placeholder="名前やメールアドレスを入力してください"
            >
        </div>

        <!-- 性別 -->
        <div class="admin-search__gender">
            <select name="gender">
                <option value="">
                    性別
                </option>

                <option value="all"
                    @if(request('gender') == 'all')
                        selected
                    @endif
                >
                    全て
                </option>

                <option value="1"
                    @if(request('gender') == '1')
                        selected
                    @endif
                >
                    男性
                </option>

                <option value="2"
                    @if(request('gender') == '2')
                        selected
                    @endif
                >
                    女性
                </option>

                <option value="3"
                    @if(request('gender') == '3')
                        selected
                    @endif
                >
                    その他
                </option>
            </select>
        </div>

        <!-- お問い合わせ種類 -->
        <div class="admin-search__category">
            <select name="category_id">

                <option value="">
                    お問い合わせの種類
                </option>

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @if(request('category_id') == $category->id)
                            selected
                        @endif
                    >
                        {{ $category->content }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- 日付 -->
        <div class="admin-search__date">
            <input
                type="date"
                name="date"
                value="{{ request('date') }}"
            >
        </div>

        <!-- ボタン -->
        <div class="admin-search__button">

            <button type="submit">
                検索
            </button>

            <button type="button"
                onclick="location.href='/admin'"
            >
                リセット
            </button>

        </div>

    </form>

</div>


    <div class="admin-table">

        @foreach($contacts as $contact)

            <div class="admin-table__item">

                <div>
                    {{ $contact->last_name }}
                    {{ $contact->first_name }}
                </div>

                <div>
                    {{ $contact->email }}
                </div>

                <div>
                    {{ $contact->category->content }}
                </div>

                <div>
                    {{ $contact->created_at }}
                </div>

                <button type="button">
                    詳細
                </button>

            </div>

        @endforeach

    </div>

    {{ $contacts->links() }}

</div>

@endsection