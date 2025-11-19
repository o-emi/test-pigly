<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規会員登録</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/register-step1.css') }}">
</head>
<body>
<div class="content">
  <div class="register-form">
    <div class="register-form__inner">
    <form class="register-form__form" action="/register/step1" method="post" novalidate>
      @csrf
      <h1 class="logo">PiGly</h1>
      <p class="title">新規会員登録</p>
      <p class="step">STEP1 アカウント情報の登録</p>
      <div class="register-form__group">
        <label class="register-form__label" for="name">お名前</label>
        <input class="register-form__input" type="text" name="name" value="{{ old('name') }}" placeholder="名前を入力">
        <p class="register-form__error-message">
          @error('name') {{ $message }} @enderror
        </p>
      </div>
      <div class="register-form__group">
        <label class="register-form__label" for="email">メールアドレス</label>
        <input class="register-form__input" type="text" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
        <p class="register-form__error-message">
          @error('email') {{ $message }} @enderror
        </p>
      </div>
      <div class="register-form__group">
        <label class="register-form__label" for="password">パスワード</label>
        <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
        <p class="register-form__error-message">
          @error('password') {{ $message }} @enderror
        </p>
      </div>
      <input class="register-form__btn btn" type="submit" value="次に進む">
      <a href="/login" class="login-link">ログインはこちら</a>
    </form>
    </div>
  </div>
</div>
</body>
</html>




