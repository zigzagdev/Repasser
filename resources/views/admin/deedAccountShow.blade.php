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
    @include('layouts/header')
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
      <div class="card-4">
          @foreach($item as $itemdata)
              @if($itemdata->admin_id == $admin->id)
                  <div class="content-img">
                      <img src="https://see-ss.com/img/card_img@2x.png"/>
                  </div>
                  <h3 class="title" style="display: inline-block; margin:0 50px 0 40px">
                      <td>{{$itemdata->item_name}}</td>
                      <td style="padding-left: 30px"><a type="button" class="a" href="{{url('admin/deedShowItem/'.$itemdata->id)}}">Detail</a></td>
                  </h3>
              @endif
          @endforeach
      </div>
      </div>
  </main>
  {{--  <footer class="showaccount_footer">--}}
  {{--    <h1 class="showaccount_mot"></h1>--}}
  {{--  </footer>--}}
</body>


