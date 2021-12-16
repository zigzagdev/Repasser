<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AccountController extends Controller
{
    public function deedCreateAccount()
    {
        return view('admin/deedCreateAccount');
    }

    public function deedCreateAccountAction(Request $request)
    {

        $datas = new Admin;

        $datas->user_name = $request->user_name;
        $datas->email = $request->email;
        $datas->password = $request->password;
        $datas->save();

//        Session::get('id', 'xxx');
//        Session::get('user_name');
//        Session::forget('email');
//        Session::forget('password');

        return view('admin/deedAccountShow')->with($datas->id);
    }

    public function deedAccountShow(Request $request,$id)
    {
        $datas = DB::table('admins')->find($id);

        return view('admin/deedAccountShow', compact('datas'));
    }

    public function deedEditAccount(Request $request, $id)
    {
        $datas = DB::table('admins')->find($id);

        return \view('admin/deedEditAccount', compact('datas'));
    }

    public function deedDeleteAccount(Request $request, $id)
    {
        $datas = DB::table('admins')->find($id);

        return view('admin/deedDeleteAccount', compact('datas'));

    }

    public function deedUpdateAccount(Request $request, $id)
    {
        $datas = DB::table('admins')->find($id);
        $message = 'User not extist';
        if ($datas === null) {
            print $message;
        }
        $datas->user_name = $request->user_name;
        $datas->email = $request->email;
        $datas->save();
        return view('admin/deedAccountShow', compact('datas'));

    }

    public function deedDeleteComplete(Request $request, $id)
    {
        $data = DB::table('admins')->find($id);
        var_dump($data);
        $data->delete();

        return view('/');
    }

    public function deedIndexAll () {

        $datas = DB::table('admins');

        return view('admin/deedIndexAll',compact('datas'));
    }

    public function deedSearchAccount(Request $request,$id) {

    }
}
