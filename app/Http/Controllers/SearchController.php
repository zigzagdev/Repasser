<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function SearchItem(Request $request)
    {

        $message = 'Fill out some words in box';
        $q = $request->input('keyword');
        $query = Item::query();

        if (!empty($q)) {
//         アイテム名かカテゴリー分類の名前で検索を行い、クエリを発行する。　joinさせて一緒の内容で出させるかのSQL文作成に関してはまだ未定
            $query->where('item_name', 'like', '%' . $q . '%')->orWhere('category_name', 'like', '%' . $q . '%');
        } else {
            echo $message;
        }

        return redirect('/SearchItem', compact('q', 'message'));
    }
}
