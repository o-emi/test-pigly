<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規会員登録</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/register-step2.css') }}">
</head>
<body>
<div class="content">
  <div class="register-2-form">
    <div class="register-2-form__inner">
    <form class="register-2-form__form" action="/register/step2" method="post">
      @csrf
      <h1 class="logo">PiGly</h1>
      <p class="title">新規会員登録</p>
      <p class="step">STEP2 体重データの入力</p>
      <div class="register-2-form__group">
        <label class="register-2-form__label" for="weight">現在の体重</label>
        <input class="register-2-form__input" type="text" name="now_weight" id="weight" placeholder="現在の体重を入力">
        <span class="unit">kg</span>
        <p class="register-2-form__error-message">
          @error('weight') {{ $message }} @enderror
        </p>
      </div>
      <div class="register-2-form__group">
        <label class="register-2-form__label" for="weight">目標の体重</label>
        <input class="register-2-form__input" type="text" name="target_weight" id="weight" placeholder="目標の体重を入力">
        <span class="unit">kg</span>
        <p class="register-2-form__error-message">
          @error('weight') {{ $message }} @enderror
        </p>
      </div>
      <input class="register-2-form__btn btn" type="submit" value="アカウント作成">
      <a href="/login" class="login-btn">ログインはこちら</a>
    </form>
    </div>
  </div>
</div>
</body>
</html>