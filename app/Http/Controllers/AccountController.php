<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function deedShowAccount(Request $request) {



      redirect('admin_deedShowAccount/{id}');
    }

    public function deedCreateAccount (Request $request){
      $inputData['id']              = $request->id;
      $inputData['user_name']       = $request->user_name;
      $inputData['password']        = $request->password;
      $inputData['email']           = $request->email;
      $inputData['item_name']       = $request->item_name;
      $inputData['description']     = $request->description;

      $result = $this->save();

         Session::get('user_name','xxx');

         Session::forget('email');
         Session::forget('item_name');
         Session::forget('description');
         Session::forget('item_category');

        return view('admin/deedShowAccount')->with('flash_message', 'Register is Success！');

    }

}
