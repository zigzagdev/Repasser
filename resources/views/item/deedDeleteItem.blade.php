<!DOCTYPE html>
<html>
  <head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
  </head>
  <body>
    <header>
      @include('../layouts/header')
    </header>
    <main class="create_main">
      @if(session('message'))
        <div class="flash_message alert-primary" style="font-size: 30px">
          {{ session('message') }}
        </div>
      @endif
      <h1 class="account_mot">Here is Delete Item Page</h1>
      <h2 class="showaccount_name">Item Name</h2>
      <div class="variable_name">
        {{$item->item_name}}
      </div>
      <h3 class="showaccount_email">Account Email</h3>
      <div class="variable_email">
        {{$item->item_content}}
      </div>
      @if (session('flash_message'))
      　<div class="flash_message">
        　　{{ session('flash_message') }}
        </div>
      @endif
      <form action="{{action('App\Http\Controllers\ItemController@deedDeleteComplete',$item->id)}}" method="post">
        @csrf
        @method('DELETE')
        <div class="account_btn">
          <a href="{{ url('admin/deedAccountShow/', $item->admin_id) }}">
            <button type="submit" id="delete" class="editac_btn" value="delete" onClick="delete_alert(event);return false;">Delete Item</button>
          </a>
          <a href="{{ url('admin/deedShowItem/'.$item->id) }}">
            <button type="submit" class="editac2_btn">Return to Account Page</button>
          </a>
        </div>
      </form>
    </main>
    <footer>
      @include('layouts.ItemFooter')
    </footer>
  </body>
</html>
