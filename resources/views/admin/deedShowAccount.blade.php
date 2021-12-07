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
    <h1 class="account_mot">Detail your account & Items</h1>
      @foreach($inputData as $data)
        <th>{{$data->user_name}}</th>
      @endforeach

    <div class="admin_common_btn">
      <a href={{route('/admin/deedShowAccount',['id'=>$inputData['id'] ->id])}}>
        <button type="submit" class="btn-primary" name="first" value="submit">To EditPage</button>
      </a>
      <a href={{route('/admin/deedShowAccount',['id'=>$inputData['id'] ->id])}}>
        <button type="submit" class="btn-primary" name="first" value="submit">Return to Top</button>
      </a>
    </div>
  </main>
  <footer>
    @include('layouts/footer')
  </footer>
</body>


