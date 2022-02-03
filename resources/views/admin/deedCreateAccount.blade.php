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

        <div class="account_form">
          <form method="post" action="{{action('App\Http\Controllers\AccountController@deedCreateAccountAction')}}">
            @csrf
            <div class="admin_name">
              <label for="user_name">Account Name</label>
              <input type="text" id="user_name" name="user_name" class="name_css" placeholder="15文字以内" value="{{old('user_name')}}">
            </div>
            <div class="password_around">
              <label for="admin_password">Password</label>
              <input type="password" id="password" name="password" class="password_css" placeholder="半角英数字20字以内">
            </div>
            <div class="password_around">
              <label for="admin_password">Password(Confirm)</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="password_css" placeholder="半角英数字20字以内" required>
            </div>
            <div class="email_around">
              <label for="admin_email">E-mail</label>
              <input type="email" id="email" name="email" class="email_css" placeholder="ex).test@com" value="{{old('email')}}">
            </div>
            <div class="base_button">
              <button type="submit" class="btn-primary">Submit</button>
                <a href="/">
                  <button type="submit" class="btn-secondary">Return Top</button>
                </a>
            </div>
          </form>
        </div>
    </div>
  </main>
  <footer>
    @include('layouts.Footer')
  </footer>
</body>
