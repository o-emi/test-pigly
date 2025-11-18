<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>
<body>
<div class="content">
  <div class="login-form">
    <div class="login-form__inner">
    <form class="login-form__form" action="/login" method="post">
      @csrf
      <h1 class="logo">PiGly</h1>
      <p class="title">ログイン</p>
      <div class="login-form__group">
        <label class="login-form__label" for="email">メールアドレス</label>
        <input class="login-form__input" type="email" name="email" id="email" placeholder="メールアドレスを入力">
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
      <a href="/login">アカウント作成はこちら</a>
    </form>
    </div>
  </div>
</div>
</body>
</html>
