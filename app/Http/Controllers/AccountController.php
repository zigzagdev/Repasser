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
        $datas->password = $request->password;
        $datas->email = $request->email;
        $datas->save();

//        Session::get('id', 'xxx');
//        Session::get('user_name');
//        Session::forget('email');
//        Session::forget('password');
        return redirect('admin/deedAccountShow/'.$datas->id);
    }

    public function deedAccountShow(Request $request, $id)
    {
        $datas = DB::table('admins')->find($id);
        $itemdatas = DB::table('items')->get();

        var_dump($datas);

        return view('admin/deedAccountShow', compact('datas','itemdatas'));
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

    public function deedDeleteComplete(Request $request, $id)
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
