<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/Item.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<header>
    @include('layouts/ItemHeader')
</header>
<main class="create_main">
    <h1 class="account_mot">Item Create Page</h1>

</main>
<footer>
  @include('layouts/ItemFooter')
</footer>
