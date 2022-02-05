<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;


class ItemController extends Controller
{
    public function deedShowItem($id)
    {
        $items = DB::table('items')->find($id);

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

        $validateRule = [
            // アイテム名
            'item_name' => ['required', 'min:3', 'max:40'],

            // 商品カテゴリー
            'item_category' => ['required'],

            // アイテム内容
            'item_content' => ['required', 'min:5', 'max:255'],

            //アイテム価格
            'price' => ['required'],

            // 商品おすすめフラグ
            'recommend_flag' => ['required'],

            // 商品画像
           'image' => ['required']
        ];

        $request->validate($validateRule);

        $items = new Item;
        $items->item_name = $request->item_name;
        $items->item_category = $request->item_category;
        $items->item_content = $request->item_content;
        $items->price = $request->price;
        $items->recommend_flag = $request->recommend_flag;
        $items->image = $request->image;
        $items->admin_id = $admin_id;
        $this->validate($request, $validateRule);
        $items->save();

        return redirect('admin/deedAccountShow/'. $items->admin_id)->with('Item has been created.');
    }

    public function deedEditItem($id)
    {
        $item = DB::table('items')->find($id);

        return view('item/deedEditItem', compact('item'));
    }

    public function deedDeleteItem($id)
    {
        $item = DB::table('items')->find($id);

        return view('item/deedDeleteItem', compact('item'))->with('flash_message', 'Item was deleted !');
    }

    public function deedUpdateItem(Request $request, $id)

    {
        $validateRule = [
            // アイテム名
            'item_name' => ['required', 'c_alpha_num', 'c_alpha_num', 'min:3', 'max:40'],

            // アイテム内容
            'item_content' => ['required', 'c_every', 'min:5', 'max:255'],

            //アイテム価格
            'price' => ['required', 'c_num_on'],

            // 商品おすすめフラグ
            'recommend_flag' => ['required'],

            // 商品カテゴリー
            'item_category' => ['required'],

            // 商品画像
            'image' => ['required']

        ];
//        一旦、インスタンス化をl.65で行い、その後インスタンス化したものにidを当てはめるのがl.66になる。
        $this->validate($request, $validateRule);
        $items = new Item;
        $item = $items::find($id);

        $message = 'User not extist';
        if ($item === null) {
            print $message;
        } else {
            $item->item_name = $request->item_name;
            $item->item_category = $request->item_category;
            $item->item_content = $request->item_content;
            $items->price = $request->price;
            $item->recommend_flag = $request->recommend_flag;
            $item->image = $request->image;
            $item->save();
        }
        return redirect('admin/deedShowItem/' . $item->id, compact('message'));
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
        return redirect('admin/deedAccountShow/' . $item->admin_id);
    }

    public function Display($id)
    {
        $items = DB::table('items')->find($id);
        $categories = DB::table('items')
                  ->select('items.id', 'item_name', 'item_content', 'price', 'categories.category_name')
                  ->join('categories', 'categories.id','=', 'items.item_category' )
                  ->get();
        $pass = [];
        foreach ($categories as $category)
          if ($category->id == $items->id){
              array_push($pass,$category);
          }

        return view('ItemDisplay', compact('items', 'pass'));
    }

}
