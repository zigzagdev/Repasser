<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function  deedCreateitem () {

        return view('item/deedCreateItem');
    }

    public function deedCreateItemAction (Request $request,$id) {

        $items = new Items;
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

}
