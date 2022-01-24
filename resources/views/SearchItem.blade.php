<!DOCTYPE html>
<html style="height: 100%">
  <head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/item.css')}}" rel="stylesheet">
  </head>
  <body style="background-color: #C9C9C9">
    <div class="footerFixed">
      <header style="background-color: #F9F9F9; ">
        @include('layouts.Header')
      </header>
  <main>
    @if(count($results) > 1 )
      <div class="search_query">
        Search Results are <span style="color: #2d3748; font-family: 'Bodoni 72'">{{count($results)}}</span> found.<br>
        Click each items if you interested in.
      </div>
      <div class="flexContainer">
        @foreach($results as $result)
          <div class="rec_item">
            <a href="{{ url('EveryItem', ["id" => $result->id]) }}" style="text-decoration: none; color: #0062cc">
              <h4 style="margin: 14px 0 0 61px;">{{ $result->item_name}}</h4>
              <img src="{{ asset('storage/'.$result->image) }}" class="img_rcm"/>
              <p style="padding-top: 4px; margin-left: 61px">¥{{$result->price}}</p>
            </a>
          </div>
        @endforeach
      </div>
      <div class="page">
        {{ $results->links('vendor/pagination/pagination') }}
      </div>
    @elseif (count($results) == 1 )
      <div class="search_query">
        Search Result is <span style="color: #2d3748; font-family: 'Bodoni 72'">{{$total}}</span> found.<br>
        Click it if you interested in.
      </div>
      <div class="flexContainer">
        @foreach($results as $result)
          <div class="rec_item">
            <a href="{{ url('EveryItem', ["id" => $result->id]) }}" style="text-decoration: none; color: #0062cc">
              <h4 style="margin: 14px 0 0 61px;">{{ $result->item_name}}</h4>
              <img src="{{ asset('storage/'.$result->image) }}" class="img_rcm"/>
              <p style="padding-top: 4px; margin-left: 61px">¥{{$result->price}}</p>
            </a>
          </div>
        @endforeach
      </div>
    @else
      <div class="search_query">
        Search Results are <span style="color: #2d3748; font-family: 'Bodoni 72';">{{count($results)}}.</span><br>
        {{$message}}<br>
        <a href="/" style="text-decoration: none; ">Click Here</a>
      </div>
    @endif
    </main>
    <footer class="footer_content" style="background-color: black; position: absolute; bottom: 0; margin-top: 10px; width: 100%">
      @include('layouts/ItemFooter')
    </footer>
    </div>
  </body>
</html>
