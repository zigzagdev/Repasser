<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<header>
    @include('../layouts/header')
</header>
<main class="create_main">
  <h1 class="index">Seller Account Search Here.</h1>
    <form action="" method="get">
     @csrf
      <div class="form_group">
        <input type="search" style="display: inline-block;margin-top: 70px;width: 400px;height: 55px;background-color: #e1e1e8;
         size: 28px;font-size: 28px; vertical-align: top;" name="searchword">
        <button style="height: 55px; width: 68px;display: inline-block;margin-top: 70px;background-color: #1a202c;
         color: whitesmoke;" type="submit">Search</button>
      </div>
    </form>




{{--    Search_Result_here--}}
</main>
