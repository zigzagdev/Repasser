<!DOCTYPE html>
<html>
<head>
    {{--       // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name',' Repasser | Logout') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<body>
<main>
</main>
<footer>
    @include('layouts.Footer')
</footer>
</body>
