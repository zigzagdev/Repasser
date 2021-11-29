<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function deedCreateAccount (Request $request){
      $inputData['id']    = $request->id;
      $inputData['user_name']    = $request->user_name;
      $inputData['password']    = $request->password;
      $inputData['email']    = $request->email;
      $inputData['item_name']    = $request->item_name;
      $inputData['description']    = $request->description;
      $inputData['recommend_flag']    = $request->recommend_flag;
      $inputData['item_category']    = $request->item_category;

      $result = $this->createAdminUser($inputData);

      //session使ってデータを保存しておく。ファサードとの兼ね合いについて見ておく。


    }
}
