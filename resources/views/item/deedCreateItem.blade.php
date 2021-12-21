<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/Item.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<header>
    @include('layouts/ItemHeader')
</header>
<main class="create_main">
    <div class="account_register">
        <h1 class="account_name">Item Register</h1>
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

        <div class="item_name">
            <form method="post" action="">
                @csrf
                <div class="admin_name">
                    <label for="item_name">Item Name</label>
                    <input type="text" id="item_name" name="item_name" class="name_css" style="width: 320px; height: 30px" placeholder="15文字以内">
                </div>
                <div class="password_around">
                    <label for="admin_password">Item Category</label>
                    <select name="index">
                        @foreach(config('category') as $index => $name)
                            <option
                                value="{{ $index }}" {{ old('index') === $index? "selected" : ""}}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="email_around">
                    <label for="admin_email">E-mail</label>
                    <input type="email" id="email" name="email" class="email_css" placeholder="ex).test@com">
                </div>
            </form>
        </div>
    </div>
</main>
<footer>
  @include('layouts/ItemFooter')
</footer>
