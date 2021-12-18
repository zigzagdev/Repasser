<!DOCTYPE html>
<html>
<head>
    {{--       // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<header>
    @include('layouts/header')
</header>
<main class="create_main">
    <h1 class="index">Your Search Results.</h1>
      <div class="result">
          <table class="table">
              <tr>
                  <th style="padding-top: 40px; padding-left: 70px">{{$counts}}hits !</th>
                  <th style="padding-top: 40px">Name</th>
                  <th style="padding-top: 40px">Address</th>
              </tr>
              @foreach($results as $result)
                  <tr>
                      <td style="font-size: 28px; color: #040505; padding-left: 75px">・</td>
                      <td style="font-size: 28px; color: #040505; padding-left: 30px">{{$result->user_name}}</td>
                      <td style="font-size: 28px; color: #040505; padding-left: 60px">{{$result->email}}</td>
                  </tr>
              @endforeach
          </table>
      </div>
</main>
</body>

