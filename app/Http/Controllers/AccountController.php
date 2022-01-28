<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Item;
use http\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public function deedCreateAccount()
    {
        return view('admin/deedCreateAccount');
    }

    public function Login()
    {
        return view('admin/Login');
    }

    public function deedLogin(Request $request)
    {
        $data = DB::table('admins')->get();

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
            if (Auth::attempt($credentials))  {

                return redirect('admin/deedAccountShow/');
            } else {
                return redirect('/');
            }
    }

    public function deedCreateAccountAction(Request $request)
    {

        $datas = new Admin;
        $datas->user_name = $request->user_name;
        $datas->password = Hash::make($request->password);
        $datas->email = $request->email;
        $datas->save();

        return redirect('admin/deedAccountShow/'.$datas->id);
    }

    public function deedAccountShow($id)
    {
        $admin = DB::table('admins')->find($id);
//       id指定していなくても、勝手にidに紐づくitemのSQLを持ってきて来れている。
        $admin_id = $admin->id;

        $items = DB::table('items')->get();

//        $itemの配列にadmin_idとitemのidの一致内容のものを入れている。
        $item = [];
        foreach ($items as $each)
          if ($each->admin_id == $admin_id) {
            array_push($item, $each);
          }
        return view('admin/deedAccountShow', compact('admin','item'));
    }

    public function deedEditAccount($id)
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
        $datas = Admin::find($id);
        $message = 'User not exist';
        if ($datas === null) {
            print $message;
        } else {

            $datas->user_name = $request->user_name;
            $datas->email = $request->email;
            $datas->save();
        }
        return redirect('admin/deedAccountShow/' . $datas->id);
    }

    public function deedDeleteComplete($id)
    {
        $data = DB::table('admins')->where('id', $id);
        $data->delete();

        return redirect('/')->with('message','Your account was deleted.');;

    }

    public function deedIndexSearch(Request $request)
    {
        $datas = DB::table('admins')
            ->
            select('user_name', 'email')
            ->get();
        $count = count($datas);

        return view('admin/deedIndexSearch', compact('count'));
    }

    public function SearchResult(Request $request)
    {
        $keyword = $request->input('data');

        $query = Admin::query();

        if (!empty($keyword)) {
            $query->where('user_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        }
        $results = $query->paginate(10);
        $counts = count($results);

        return view('admin/SearchResult', compact('results', 'keyword', 'counts'));
    }
}
