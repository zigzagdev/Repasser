<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function  deedCreateitem (Request $id) {

        return view('item/deedCreateItem');
    }

    public function deedCreateItemAction (Request $request) {

        $items = new Items;
        $items->item_name = $request->item_name;
        $items->item_category = $request->item_category;
        $items->item_content = $request->item_content;
        $items->item_content = $request->item_content;
        $items->save();

//        Session::get('id', 'xxx');
//        Session::get('user_name');
//        Session::forget('email');
//        Session::forget('password');
        return redirect('admin/deedAccountShow/'.$items->admin_id);
    }

    public function deedEdititem (Request $request, $id){


        return view('item/deedEditItem');
    }

    public function deedDeleteitem (Request $request, $id){


        return view('item/deedDeleteItem');
    }

}
