<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function SearchItem(Request $request)
    {
//          inner_joinの結果のSQL
//        SELECT item_name,item_content,image,categories.category_name FROM `items` INNER JOIN `categories` ON items.item_category = categories.id

        $message = 'Nothing was found... Please change search words';
        $q = $request->input('keyword');
        $query = DB::table('items')
                 ->join('categories', 'items.item_category', '=', 'categories.id')
                 ->select('item_name', 'item_content', 'image', 'category_name', 'items.id', 'price');

        if (!empty($q)) {
//         アイテム名かカテゴリー分類の名前で検索を行い、クエリを発行する。　joinさせて一緒の内容で出させるかのSQL文作成に関してはまだ未
            $query->where('item_name', 'like', '%' . $q . '%')
                ->orWhere('item_content', 'like', '%' . $q . '%')
                ->get();
        }
        $results = $query->paginate(4);
        $total = count($results);

        return view('SearchItem',compact('results', 'q', 'message', 'total'));
    }
}
