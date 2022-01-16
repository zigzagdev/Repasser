<!DOCTYPE html>
<html>
<head>
    {{--   // config/app.phpの修正を行った。第一引数に.envのapp_nameを渡している。--}}
    <title>{{ config('app.name','Repasser') }}</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<main>
    @foreach($results as $result)
        <tr>
            <td style="font-size: 28px; color: #040505; padding-left: 75px">・</td>
            <td style="font-size: 28px; color: #040505; padding-left: 30px">{{$result->item_name}}</td>
            <td style="font-size: 28px; color: #040505; padding-left: 60px">{{$result->item_content}}</td>
        </tr>
    @endforeach
</main>
