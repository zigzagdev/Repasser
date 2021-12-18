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
    @foreach($email as $address)
        <td>{{ $address->email }}</td>
        <td>{{ $address->updated_at }}</td>
        </tr>
    @endforeach
</main>
