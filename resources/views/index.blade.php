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
        <h1 class="search_index">Search Item</h1>
          <form method="post" action="{{url('/SearchItem')}}">
            <div class="search_form">
              <input type="text" name="keyword" value="" class="form_content" placeholder="商品名を入力してください">
              <input type="submit" value="検索" class="search_btn_info">
            </div>
          </form>
          <div class="index_reccomend">
            <h1 class="index_reccomend_spell">Reccomend Items</h1>
          </div>
      </div>
    </main>
  </div>
  <footer>
      @include('layouts/footer')
  </footer>
</body>

