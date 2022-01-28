<!DOCTYPE html>
<html>
<head>
    {{--       // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name',' Repasser | Login ') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>

<body>
  <header>
    @include('layouts.Header')
  </header>
  <main style="flex: 1">
    <div class="row">
      <div class="box">
        <h1 style="margin-left: 40px">Sign In</h1>
          @if(count($errors) >0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            </div>
          @endif
          <form action="{{action('App\Http\Controllers\AccountController@deedLogin')}}" method="POST">
            <div class="form-group">
              <label for="email">E-Mail</label>
              <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">ログイン</button>
              {{ csrf_field() }}
          </form>
      </div>
    </div>
  </main>
</body>
