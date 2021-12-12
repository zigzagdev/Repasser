<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class AccountController extends Controller
{
    public function deedCreateAccount (Request $request){

        $data = new  Admin;

        $data->create([
            'id' => $request->id,
            'user_name' => $request->user_name,
            'password' => $request->password,
            'email' => $request->email
        ]);


        Session::get('id','xxx');
        Session::get('user_name');
        Session::forget('email');
        Session::forget('password');

        return redirect()->route('admin/deedCreateAccount');
    }

    public function deedAccountShow (Request $id) {
        $data = Admin::find($id);
//        var_dump($data);
        return view('admin/deedAccountShow',compact('data'));
    }

    public function deedEditAccount (Request $id) {
        $data = Admin::find($id);

        return \view('admin/deedEditAccount',compact('data'));
    }
    public function deedDeleteAccount (Request $id) {

    }

}
