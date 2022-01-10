<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<body>
<header>
    @include('../layouts/header')
</header>
<main class="create_main">
    <h1 class="account_mot">Here is Delete Item Page</h1>
    <h2 class="showaccount_name">Account Name</h2>
    <div class="variable_name">
        {{$datas->user_name}}
    </div>
    <h3 class="showaccount_email">Account Email</h3>
    <div class="variable_email">
        {{$datas->email}}
    </div>

    <form action="{{action('App\Http\Controllers\AccountController@deedDeleteComplete',$datas->id)}}" method="post">
        @csrf
        @method('DELETE')
        <div class="account_btn">
            <a href="/">
                <button type="submit" id="delete" class="editac_btn">Delete Account</button>
            </a>
            <a href="{{ url('admin/deedAccountShow/'.$datas->id) }}">
                <button type="submit" class="editac2_btn">Return to Account Page</button>
            </a>
        </div>
    </form>
</main>
<footer>
    @include('layouts.Itemfooter')
</footer>
