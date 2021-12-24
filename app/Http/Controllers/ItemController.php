<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ItemController extends Controller
{
    public function  deedCreateitem (Request $id) {

        $admin_id = DB::table('admins')->find($id);

        return redirect('admin/item/deedCreateItem/'.$id);
    }

    public function deedCreateItemAction (Request $request, $id) {

        $admin_id = DB::table('admins')->find($id);

        $items = new Item;
        $items->item_name = $request->item_name;
        $items->item_category = $request->item_category;
        $items->item_content = $request->item_content;
        $items->item_content = $request->recommend_flag;
        $items->save();

        return redirect('admin/deedAccountShow/'.$id);
    }

    public function deedEdititem (Request $request, $id){


        return view('item/deedEditItem');
    }

    public function deedDeleteitem (Request $request, $id){


        return view('item/deedDeleteItem');
    }

    public function deedUpdateitem (Request $request, $id) {

        $datas = Item::find($id);

        $message = 'Item did not extist';
        if ($datas === null) {
            print $message;
        } else {

            $datas->item_name     = $request->item_name;
            $datas->item_category = $request->item_category;
            $datas->item_content  = $request->item_content;
            $datas->item_content  = $request->recommend_flag;
            $datas->image         = $request->image;
            $datas->save();
        }
        return redirect('admin/deedAccountShow/' . $datas->account_id);
    }

    public function deedDeleteComplete (Request $id) {

        $datas = Item::find($id);

    }

}
