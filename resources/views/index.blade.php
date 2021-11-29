<!DOCTYPE html>
<html>
<head>
{{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
  <title>{{ config('app.name','Repasser') }}</title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
  <div class="body_wrapper">
    <header>
      @include('layouts/header')
    </header>
    <main class="main_body">
      <div class="initial_body">
        <h1 style="color: lightsalmon"> Fuck you</h1>
      </div>
    </main>
  </div>
  <footer>
      @include('layouts/footer')
  </footer>
</body>

