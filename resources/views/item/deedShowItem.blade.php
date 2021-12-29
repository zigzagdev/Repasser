<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/item.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<header>
    @include('layouts/ItemHeader')
</header>
<main>
    <h1 class="account_mot">Detail your account & Items</h1>
    <h2 class="showaccount_name">Account Name</h2>
    <div class="variable_name">
        {{$items->itemname}}
    </div>
    <h3 class="showaccount_email">Account Email</h3>
    <div class="variable_email">
        {{$items->item_content}}
    </div>
</main>
