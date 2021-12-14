<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


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

    public function deedAccountShow (Request $request, $id) {
        $datas = DB::table('admins')->find($id);

        return view('admin/deedAccountShow',compact('datas'));
    }

    public function deedEditAccount (Request $request, $id) {
        $datas = DB::table('admins')->find($id);


        return \view('admin/deedEditAccount',compact('datas'));
    }
    public function deedDeleteAccount (Request $id) {
        var_dump($id);

        return view('admin/deedEditAccount',compact('id'));

    }

//    public function deedUpdateAccount (Request $request, $id) {
//        $data = DB::table('admins')->find($id);
//        var_dump($data);
//        return view('admin/deedAccountShow',compact('data'));
//
//    }

}
