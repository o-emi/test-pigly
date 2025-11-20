@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/index.css') }}">
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
<div class="admin">
  <div class="admin__inner">
      <section class="stats">
        <div class="stat-box">
          <p class="stat-title">目標体重</p>
          <p class="stat-value">{{ $targetWeight ?? '--' }} kg</p>
        </div>
        <div class="stat-box">
          <p class="stat-title">目標まで</p>
          <p class="stat-value">{{ $diffWeight ?? '--' }} kg</p>
        </div>
        <div class="stat-box">
          <p class="stat-title">最新体重</p>
          <p class="stat-value">{{ $latestWeight ?? '--' }} kg</p>
        </div>
      </section>

  <div class="search-area">
      <section class="search-area__inner">
        <form action="/" method="get" class="search-area__form">
          <input type="date" name="from" class="search-area__input">
            <span class="tilde">〜</span>
            <input type="date" name="to" class="search-area__input">
            <button class="search-btn">検索</button>
        </form>
      </section>
      <a href="/weight/create" class="add-btn">データ追加</a>
  </div>

  <div class="weight-table">
    <section class="weight-table__inner">
      <table class="weight-table__area">
        <thead>
          <tr>
            <th>日付</th>
            <th>体重</th>
            <th>食事摂取カロリー</th>
            <th>運動時間</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($weights ?? [] as $w)
            <tr>
              <td>{{ \Carbon\Carbon::parse($w->date)->format('Y/m/d') }}</td>
              <td>{{ number_format($w->weight, 1) }}kg</td>
              <td>{{ number_format($w->calorie) }}cal</td>
              <td>{{ substr($w->exercise_time, 0, 5) }}</td>
              <td>
                <a href="/weight/{{ $w->id }}/edit" class="edit-icon">
                <img src="{{ asset('images/pencil.png') }}" alt="編集" class="edit-icon-img">
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
        </table>
      </section>

    <div class="pagination">
      {{ $weights->links() ?? '' }}
    </div>
  </div>
  </div>
</div>
@endsection
