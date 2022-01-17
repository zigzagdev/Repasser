<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/item.css')}}" rel="stylesheet">
</head>
<body>
    <header>
        @include('layouts.Header')
    </header>
    <main class="main_body">
        <div class="admin_rgst">
            <a href="admin/deedCreateAccount" class="admin_rgst_mot">Only Staff here.</a>
        </div>
        <div class="initial_body">
            <h2 class="search_index">Search Item</h2>
            <form method="GET" action="{{action('App\Http\Controllers\SearchController@SearchItem')}}">
                <div class="search_form">
                    <input type="text" name="keyword" value="" class="form_content" placeholder="商品名か商品カテゴリーを入力してください">
                    <input type="submit" value="検索" class="search_btn_info">
                </div>
            </form>
            <div class="index_recommend">
              <h3 class="index_recommend_spell">Recommend Items</h3>
                @foreach($item as $recommend)
                  <ul class="flexContainer">
                    <div class="rec_item">
                      <a href="{{ url('EveryItem', ["id" => $recommend->id]) }}"><h4>{{ $recommend->item_name}}</h4></a>
                    </div>
                  </ul>
                @endforeach
            </div>
        </div>
    </main>
<footer class="footer_content">
  @include('layouts/Footer')
</footer>
</body>
