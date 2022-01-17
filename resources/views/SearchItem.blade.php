<!DOCTYPE html>
<body>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<body>
  <header style="background-color: #edf2f7">
    @include('layouts.Header')
  </header>
  <main>
    @if(!empty($results))
      @foreach($results as $result)
        <tr>
            <td style="font-size: 28px; color: #040505; padding-left: 75px">・</td>
            <td style="font-size: 28px; color: #040505; padding-left: 30px">{{$result->item_name}}</td>
            <td style="font-size: 28px; color: #040505; padding-left: 60px">{{$result->item_content}}</td>
        </tr>
      @endforeach
    @else
    <?php dd($message); ?>
    @endif
  </main>
  <footer class="footer_content">
      @include('layouts/Footer')
  </footer>
</body>
