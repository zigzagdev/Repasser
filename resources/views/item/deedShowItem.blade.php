<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/item.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<header>
    @include('layouts.Itemheader')
</header>
<main class="create_main">
    <h1 class="account_mot">About the Item</h1>
    <h2 class="showaccount_name">Item Name</h2>
    <div class="variable_name">
        {{$items->item_name}}
    </div>
    <h3 class="showaccount_email">Content</h3>
    <div class="variable_email">
        {{$items->item_content}}
    </div>
    <div class="account_btn">
      <a href="{{url('admin/item/deedEditItem/'.$items->id)}}">
        <button type="submit" class="edit_btn" style="background-color: darkblue">Edit Item</button>
      </a>
      <a href="{{ url('admin/item/deedDeleteItem/'.$items->id)}}">
        <button type="submit" class="delete_btn" style="background-color: #e83e8c">Delete Item</button>
      </a>
      <a href="{{url('admin/deedAccountShow/'.$items->admin_id )}}">
        <button type="submit" class="create_btn" style="background-color: #3d4852">Return to Index</button>
      </a>
    </div>
</main>
