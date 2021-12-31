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
    public function deedShowItem ($itemdata) {

        $itemdataint = intval($itemdata);
        $items = DB::table('items')->find($itemdataint);

        return view('item/deedShowItem', compact('items'));
    }

    public function  deedCreateItem ($id) {

        $item_id = intval($id);

        return view('item/deedCreateItem',compact('item_id'));

    }

    public function deedCreateItemAction(Request $request, $eachdata)
    {
//        formRequestで送られてくるプロパティ等は基本的に全てstring変更されてしまう。(例え、それがid(int)指定してても)
//        →その為、必ずidを送る際やstring以外での形で送る際は型変更をしてあげること。
//        型変更が多い場合はFormRequestファイルにて一括でまとめる方法が良いのかも。下みたいにcastするのめんどくさいし。

        $admin_id =  intval($eachdata);


        $items = new Item;
        $items->item_name = $request->item_name;
        $items->item_category = $request->item_category;
        $items->item_content = $request->item_content;
        $items->recommend_flag = $request->recommend_flag;
        $items->image = $request->image;
        $items->admin_id = $admin_id;
        $items->save();

        return redirect('admin/deedAccountShow/'.$items->admin_id);
    }

    public function deedEditItem ($id){

        $items = DB::table('items')->get();
        $update = [];
        foreach ($items as $item) {
            array_push($update, $item);
        }
        return view('item/deedEditItem', compact('item'));
    }

    public function deedDeleteItem (Request $request, $id){

        return view('item/deedDeleteItem');
    }

    public function deedUpdateItem (Request $request, $item) {

        $items = Item::find($request->id);
var_dump($items);
        $message = 'Item did not extist';
        if ($items === null) {
            print $message;
        } else {

            $items->item_name     = $request->item_name;
            $items->item_category = $request->item_category;
            $items->item_content  = $request->item_content;
            $items->item_content  = $request->recommend_flag;
            $items->image         = $request->image;
            $items->save();
        }
        return redirect('admin/deedAccountShow/' . $items->account_id);
    }

    public function deedDeleteComplete (Request $id) {

        $datas = Item::find($id);

    }

}
