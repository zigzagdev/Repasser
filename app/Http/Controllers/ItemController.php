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
    public function deedShowItem($id)
    {

        $items = DB::table('items')->find($id);

        $category = DB::table('categories')->get();
        var_dump($category);
        return view('item/deedShowItem', compact('items'));
    }

    public function deedCreateItem($id)
    {
        $item_id = intval($id);

        return view('item/deedCreateItem', compact('item_id'));
    }

    public function deedCreateItemAction(Request $request, $eachdata)
    {
//        formRequestで送られてくるプロパティ等は基本的に全てstring変更されてしまう。(例え、それがid(int)指定してても)
//        →その為、必ずidを送る際やstring以外での形で送る際は型変更をしてあげること。
//        型変更が多い場合はFormRequestファイルにて一括でまとめる方法が良いのかも。下みたいにcastするのめんどくさいし。
        $admin_id = intval($eachdata);

        $validations = [
            'item_name' => ['required', 'integer','max:30'],
            'item_content' => ['required','string','max:100']
        ];

        $this->validate($request, $validations);
        $items = new Item;
        $items->item_name = $request->item_name;
        $items->item_category = $request->item_category;
        $items->item_content = $request->item_content;
        $items->recommend_flag = $request->recommend_flag;
        $items->image = $request->image;
        $items->admin_id = $admin_id;
        $items->save();

        return redirect('admin/deedAccountShow/' . $items->admin_id);
    }

    public function deedEditItem($id)
    {
        $item = DB::table('items')->find($id);

        return view('item/deedEditItem', compact('item'));
    }

    public function deedDeleteItem($id)
    {
        $item = DB::table('items')->find($id);

        return view('item/deedDeleteItem', compact('item'));
    }

    public function deedUpdateItem(Request $request, $id)
    {
//        一旦、インスタンス化をl.65で行い、その後インスタンス化したものにidを当てはめるのがl.66になる。
        $items = new Item;
        $item = $items::find($id);

        $message = 'User not extist';
        if ($item === null) {
            print $message;
        } else {
            $item->item_name = $request->item_name;
            $item->item_category = $request->item_category;
            $item->item_content = $request->item_content;
            $item->recommend_flag = $request->recommend_flag;
            $item->image = $request->image;
            $item->save();
        }
        return redirect('admin/deedShowItem/' . $item->id);
    }

    public function deedDeleteComplete($id)
    {
        $items = new Item;
        $item = $items::find($id);

        $message = 'This Item was not found in here';

        if ($item == null) {
            echo $message;
        } else {
            $item->delete();
        }
        session()->flash('message', 'Your Item was deleted');
        return redirect('admin/deedAccountShow/' . $item->admin_id);
    }

}
