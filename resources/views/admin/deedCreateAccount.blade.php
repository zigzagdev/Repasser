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
            <div class="password_around">
              <label for="admin_password">Password</label>
              <input type="password" name="admin_password" class="password_css" id="admin_password" placeholder="半角英数字20字以内">
            </div>
            <div class="email_around">
              <label for="admin_email">E-mail</label>
              <input type="email" name="admin_email" class="email_css" id="admin_email" placeholder="ex).test@com">
            </div>
          </form>
            <div class="base_button">
              <button class="btn-primary" type="submit" name="first" value="submit">Submit</button>
{{--              <button class="btn-secondary" type="submit" name="second" value="return" onclick="location.href='https://127.0.0.1:8000'">Return</button>--}}
              <a href="/">
                <button type="submit" class="btn-secondary">Return Home</button>
              </a>
            </div>
        </div>
    </div>
  </main>
  <footer>
    @include('layouts/footer')
  </footer>
</body>
