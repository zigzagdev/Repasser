<!DOCTYPE html>
<html>
<head>
    {{--       // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<body>
<header>
    @include('layouts.Header')
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
    {{--    @if (session('message'))--}}
    {{--        <div class="alert_alert-danger">--}}
    {{--            {{ session('message') }}--}}
    {{--        </div>--}}
    {{--    @endif--}}

{{--    ここの$datasには配列形式でidに紐づく情報が読み込まれている。その為、formのactitonにはURLで必要とする変数のプロパティを--}}
{{--    指定してあげて、渡してあげる。--}}
      <form action="{{ action('App\Http\Controllers\AccountController@deedUpdateAccount', $datas->id)}}" method="post">
        @csrf
        @method('PUT')
        <h2 class="showaccount_name">Account Name</h2>
        <div class="variable_name">
            <input type="text" id="id" name="user_name" class="edit_form"
                   value="{{ old('$datas->user_name', $datas->user_name) }}"
                   placeholder="Submit your Name">
        </div>
        {{--        パスワードは変更する時にのみ入力する。--}}
        {{--      <h3 class="showaccount_email">Account Email</h3>--}}
        {{--        <div class="variable_email">--}}
        {{--          <input id="id" class="edit_form" type="text" value="{{ old('$datas->email', $datas->email) }}" placeholder="新しいEmailを入力してください。">--}}
        {{--        </div>--}}
        {{--      <h3 class="showaccount_email">Account Email</h3>--}}
        {{--        <div class="variable_email">--}}
        {{--          <input id="id" class="edit_form" type="text" value="{{ old('$datas->email', $datas->email) }}" placeholder="新しいEmailを入力してください。">--}}
        {{--        </div>--}}
        <h3 class="showaccount_email">Account Email</h3>
        <div class="variable_email">
            <input type="email" id="id" name="email" class="edit_form" value="{{ old('$datas->email', $datas->email) }}"
                   placeholder="Submit your  Address.">
        </div>
        <div class="account_btn">
            <a href="{{ url('admin/deedAccountShow/'.$datas->id) }}">
                <button type="submit" class="editac_btn">Edit Submit</button>
            </a>
            <button type="button" class="editac2_btn" onClick="history.back()">Return to previous page</button>
        </div>
      </form>
</main>
{{--  <footer>--}}
{{--    @include('layouts/footer')--}}
{{--  </footer>--}}
</body>

