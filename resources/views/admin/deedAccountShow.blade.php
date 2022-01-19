<!DOCTYPE html>
<html>
<head>
{{--       // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
  <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/item.css')}}" rel="stylesheet">
</head>
<body>
  <header>
    @include('layouts.Header')
  </header>
  <main class="create_main">
    <h1 class="account_mot">Detail your account & Items</h1>
      <h2 class="showaccount_name">Account Name</h2>
        <div class="variable_name">
          {{$admin->user_name}}
        </div>
      <h3 class="showaccount_email">Account Email</h3>
        <div class="variable_email">
          {{$admin->email}}
        </div>
    <div class="account_btn">
      <a href="{{ url('admin/deedEditAccount/'.$admin->id) }}">
          <button type="submit" class="edit_btn">Edit Account</button>
      </a>
        <a href="{{ url('admin/deedDeleteAccount/'.$admin->id) }}">
            <button type="submit" class="delete_btn">Delete Account</button>
        </a>
        <a href="{{url('admin/item/deedCreateItem/'.$admin->id )}}">
            <button type="submit" class="create_btn">Item Create</button>
        </a>
    </div>
      {{--    Item_Display  --}}
    <div class="index_recommend">
      <div class="flexContainer">
        @foreach($item as $itemdata)
          <div class="rec_item">
            <ul class="card_content">
              <p style="text-align: center; margin: 7px; color: #1a202c">{{$itemdata->item_name}}</p>
              <p><img src="{{ asset('storage/'.$itemdata->image) }}" class="img_rcm"/></p>
              <p><a type="button" class="a1" href="{{url('admin/deedShowItem/'.$itemdata->id)}}">Detail</a></p>
            </ul>
          </div>
        @endforeach
      </div>
    </div>
  </main>
  {{--  <footer class="showaccount_footer">--}}
  {{--    <h1 class="showaccount_mot"></h1>--}}
  {{--  </footer>--}}
</body>


