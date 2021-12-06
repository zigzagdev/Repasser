<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
  <header>
    @include('../layouts/header')
  </header>
  <main class="create_main">
    <div class="account_register">
      <h1 class="account_name">Account Register</h1>
{{--        validation_error  --}}
        @if($errors->any())
          <div class="error_message">
            <ul>
              @foreach($errors->all() as $error)
                <li style="color: #ff6666; text-align: center">{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
{{--        form area--}}
        <div class="account_form">
          <form action="{action('AccountController@deedCreateAccount')}" method="post">
          @csrf
            <div class="admin_name">
              <label for="admin_name">Account Name</label>
              <input type="text" name="admin_name" class="name_css" placeholder="15文字以内" id="admin_name">
            </div>
          </form>
        </div>
    </div>
  </main>
  <footer>
    @include('layouts/footer')
  </footer>
</body>
