<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<body>
  <header>
    @include('layouts.Header')
  </header>
  <main class="main_body" style="background-color: #ececf6">
    <h1 class="account_mot">About the Item</h1>
    <h2 class="showaccount_name">Item Name</h2>
    <div class="variable_name">
      {{$items->item_name}}
    </div>
    <h3 class="showaccount_email">Content</h3>
    <div class="variable_email">
      {{$items->item_content}}
    </div>
    <h4 class="showaccount_email">Image</h4>
    <div class="variable_email">
      <img src="{{ asset('storage/'.$items->image) }}" style="width: 250px; height: 280px"/>
    </div>
    <h5 class="showaccount_email">ItemCategory</h5>
    <div class="variable_email">
      @foreach($pass as $eachcategory)
        {{$eachcategory->category_name}}
      @endforeach
    </div>
  </main>

  <footer class="footer_content" style="background-color: black">
      @include('layouts/ItemFooter')
  </footer>
</body>
