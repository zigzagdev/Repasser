<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function deedShowAccount() {



      redirect('admin_deedShowAccount/{id}');
    }

    public function deedCreateAccount (Request $request){
      $inputData['id']              = $request->id;
      $inputData['user_name']       = $request->user_name;
      $inputData['password']        = $request->password;
      $inputData['email']           = $request->email;

      $result = $this->save();

         Session::get('user_name','xxx');

         Session::forget('email');
         Session::forget('item_name');

        return view('admin/deedShowAccount')->with('flash_message', 'Register is Success！');

    }

    public function deedEditAccount (Request $id) {

    }

    public function deedDeleteAccount (Request $id) {

    }

}
