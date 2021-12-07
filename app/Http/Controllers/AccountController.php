<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function deedShowAccount(Request $id) {

        $Accounts = Account::findOrFail($id);


      redirect('admin_deedShowAccount/{id}');
    }

    public function deedCreateAccount (Request $request){
      $inputData['id']              = $request->input('id');
      $inputData['user_name']       = $request->input('user_name');
      $inputData['password']        = $request->input('password');
      $inputData['email']           = $request->input('email');

      $inputData->save();

         Session::get('user_name','xxx');
         Session::get('id','xxx');
         Session::forget('email');
         Session::forget('password');

        return view('admin/deedShowAccount/{id}')->with('flash_message', 'Register is Success！');

    }

    public function deedEditAccount (Request $id) {

    }

    public function deedDeleteAccount (Request $id) {

    }

}
