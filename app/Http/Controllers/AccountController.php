<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use http\Message;
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

    public function deedAccountShow(Request $request, $id)
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
        $data->delete();

        return view('/');
    }

    public function deedIndexSearch(Request $request)
    {

        $datas = DB::table('admins')
            ->
            select('user_name', 'email')
            ->get();
        return view('admin/deedIndexSearch',compact('datas'));
    }

    public function SearchResult(Request $request)
    {

        $keyword = $request->input('email');

        //クエリ作成
        $query = Admin::query();

        //キーワードが入力されている場合
        if (!empty($keyword)) {
            $query->where('user_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        }
        $results = $query->paginate(10);
        $counts  = count($results);
        return view('admin/SearchResult', compact('results','keyword','counts'));
    }
}
