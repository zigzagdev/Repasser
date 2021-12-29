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
    public function deedShowItem ($id, $item_name) {
        $admin_id = intval($id);
        var_dump($item_name);
        var_dump($admin_id);

        return redirect('admin/'.$admin_id.'/deedShowItem/'.$item_name);
    }

    public function  deedCreateItem ($id) {

        $item_id = intval($id);
        var_dump($item_id);
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

    public function deedEdititem (Request $request, $id){


        return view('item/deedShowItem');
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
