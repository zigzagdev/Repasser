<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function SearchItem (Request $request) {

        $keyword = $request->input('keyword');
//        query_builder
        $query = Item::query();

        if(!empty($keyword))
        {
//         アイテム名かカテゴリー分類の名前で検索を行い、クエリを発行する。　joinさせて一緒の内容で出させるかのSQL文作成に関してはまだ未定
            $query->where('item_name','like','%'.$keyword.'%')->orWhere('category_name','like','%'.$keyword.'%');
        }

        return view('/')->with('flash_message', 'Results were found');
    }
}
