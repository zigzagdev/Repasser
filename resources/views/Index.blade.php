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
            <a href="admin/login" class="admin_rgst_mot">Only Staff here.</a>
        </div>
        <div class="initial_body">
            <h2 class="search_index">Search Item</h2>
            <form method="GET" action="{{action('App\Http\Controllers\SearchController@SearchItem')}}">
                <div class="search_form">
                    <input type="text" name="keyword" value="" class="form_content" placeholder="検索内容">
                    <input type="submit" value="検索" class="search_btn_info">
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">商品カテゴリ</label>
                    <div class="col-sm-3">
                        <select name="item_category" class="form-control" >
                            @foreach(config('category') as $index => $name)
                                <option value="{{ $index }}">
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <div class="index_recommend">
              <h3 class="index_recommend_spell">Recommend Items</h3>
                <div class="flexContainer">
                  @foreach($item as $recommend)
                    <div class="rec_item">
                      <a href="{{ url('EveryItem', ["id" => $recommend->id]) }}" style="text-decoration: none; color: #0062cc">
                        <h4 style="margin-top: 14px; text-align: center">{{ $recommend->item_name}}</h4>
                        <img src="{{ asset('storage/'.$recommend->image) }}" class="img_rcm"/>
                        <p style="padding-top: 4px; margin-left: 61px">¥{{$recommend->price}}</p>
                      </a>
                    </div>
                  @endforeach
                </div>
                <div class="page">
                  {{ $item->links('vendor/pagination/pagination') }}
                </div>
            </div>
        </div>
    </main>
    <footer class="footer_content">
      @include('layouts/Footer')
    </footer>
</body>

