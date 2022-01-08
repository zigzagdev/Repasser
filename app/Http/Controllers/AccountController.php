<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Item;
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
        $datas->password = $request->password;
        $datas->email = $request->email;
        $datas->save();

        return redirect('admin/deedAccountShow/'.$datas->id);
    }

    public function deedAccountShow($id)
    {
        $admin_id = intval($id);
//        Admin_id=3
        $admin = DB::table('admins')->find($admin_id);
//       id指定していなくても、勝手にidに紐づくitemのSQLを持ってきて来れている。
        $item = DB::table('items')->get();

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
//        ddを行うと、しっかりIDを取って、ddを行えている。
        $datas = Admin::find($id);
        $message = 'User not extist';
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

        session()->flash('message', 'Your Account was deleted');
        return redirect('/');
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
