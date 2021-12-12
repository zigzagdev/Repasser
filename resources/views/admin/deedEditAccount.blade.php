<!DOCTYPE html>
<html>
<head>
{{--       // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
  <header>
    @include('layouts/header')
  </header>
  <main class="create_main">
    <h1 class="account_mot">Here is Edit Page</h1>
      @if($errors->any())
        <div class="error_message">
          <ul>
            @foreach($errors->all() as $error)
              <li style="color: #ff6666; text-align: center">{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <h2 class="showaccount_name">Account Name</h2>
        <div class="variable_name">
            <?php  var_dump($datas); ?>

        </div>
      <h3 class="showaccount_email">Account Email</h3>
        <div class="variable_email">
          {{$datas->email}}
        </div>
      <div class="account_btn">
          <a href="">
              <button type="submit" class="editac_btn">Edit Submit</button>
          </a>
          <a href="javascript:history.go(-1)">
{{--              can return to previous page but URL isn't correctly--}}
              <button type="submit" class="editac2_btn">Return to previous page</button>
          </a>
      </div>
  </main>
{{--  <footer>--}}
{{--    @include('layouts/footer')--}}
{{--  </footer>--}}
</body>

