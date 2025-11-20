@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/detail.css') }}">
@endsection

@section('link')
<div class="header__menu">
    <a href="/settings" class="header__btn">目標体重設定</a>
    <form action="/logout" method="post">
        @csrf
        <button class="header__btn logout-btn">ログアウト</button>
    </form>
</div>
@endsection

@section('content')
  <div class="detail-form">
    <div class="detail-form__inner">
    <form class="detail-form__form" action="/weight_logs/{:weightLogId}" method="post">
      @csrf
      <div class="detail-form__title">Weight Log</div>
        <p class="title">ログイン</p>
      <div class="login-form__group">
        <label class="login-form__label" for="email">メールアドレス</label>
        <input class="login-form__input" type="email" name="email" id="email" placeholder="メールアドレスを入力" value="{{ old('email') }}">
        <p class="login-form__error-message">
          @error('email') {{ $message }} @enderror
        </p>
      </div>
      <div class="login-form__group">
        <label class="login-form__label" for="password">パスワード</label>
        <input class="login-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
        <p class="login-form__error-message">
          @error('password') {{ $message }} @enderror
        </p>
      </div>
      <input class="login-form__btn btn" type="submit" value="ログイン">
      <a href="/register/step1">アカウント作成はこちら</a>
    </form>
    </div>
  </div>
</div>