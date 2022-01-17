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

        $message = 'Fill out some words in box';
        $q = $request->input('keyword');
        $query = Item::query();

        if (!empty($q)) {
//         アイテム名かカテゴリー分類の名前で検索を行い、クエリを発行する。　joinさせて一緒の内容で出させるかのSQL文作成に関してはまだ未
            $query->where('item_name', 'like', '%' . $q . '%')
                ->orWhere('item_content', 'like', '%' . $q . '%')
                ->get();
        } else {
            echo $message;
        }
        $results = $query->get();
dd($query);
        return view('SearchItem',compact('results', 'q', 'message'));
    }
}
