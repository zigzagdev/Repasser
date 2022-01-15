<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/item.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<header>
    @include('layouts/header')
</header>
<main>
  <div class="account_register">
    <h1 class="account_name">Update your Item information</h1>
        {{--        validation_error  --}}
    @if($errors->any())
      <div class="error_message">
        <ul>
          @foreach($errors->all() as $error)
          <li style=" color: #ff6666; text-align: center">{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

      <div class="item_name">
        <form method="post" action="{{action('App\Http\Controllers\ItemController@deedUpdateItem',$item->id)}}">
        @csrf
        @method('PUT')
          <div class="admin_name">
            <label for="item_name">Item Name</label>
              {{--              因みに、$itemにはControllerで取ってきた配列が入っている。--}}
            <input type="text" id="item_name" name="item_name" class="name_css" style="width: 320px; height: 30px" value="{{$item->item_name}}" placeholder="20文字以内">
          </div>
          <div class="password_around">
              <label for="admin_password">Item Category</label>
              <select name="item_category" style="margin-left: 30px">
                @foreach(config('category') as $index => $category )
                  <option value="{{ $index }}" {{ old('index') === $index? "selected" : ""}}>{{ $category }}</option>
                @endforeach
              </select>
            </div>
            <div class="email_around">
              <label for="item_content">Product Description</label>
              <textarea rows="8" cols="40" name="item_content" placeholder="Write some product description">{{old('item_content')}}</textarea>
            </div>
            <div class="email_around">
              <p style="font-size: 30px; ">Recommendation  or Not</p>
              <input class="form-check-input" type="radio" name="recommend_flag" id="r_flag" value="1" checked="checked" {{ old('recommend_flag','1') == 'yes' ? 'checked' : '' }}>
              <label class="form-check-label" for="exampleRadios1">
                yes
              </label>
              <input class="form-check-input" type="radio" name="recommend_flag" id="r_flag" value="2" {{ old('recommend_flag') == 'no' ? 'checked' : '' }}>
              <label class="form-check-label" for="exampleRadios2">
                no
              </label>
            </div>
            <div class="email_around">
              <p style="font-size: 30px; ">Upload the image </p>
              <input type="file" name="image" accept="image/jpeg, image/png">
            </div>
            <div class="base_button" style="margin-top: 10px">
              <a href="{{url('admin/deedShowItem/'.$item->id)}}" style="margin-left: 80px">
                <button type="submit" class="editac_btn">Edit Submit</button>
              </a>
              <button type="button" class="editac2_btn" onClick="history.back()" style="border-radius: 5px;">Return to previous page</button>
            </div>
          </form>
      </div>

  </div>
</main>
