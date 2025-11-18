@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="目標体重設定">
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')