<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function SearchItem(Request $request)
    {
        $message = 'Nothing was found... Please change search words';
        $q = $request->input('keyword');
        $query = DB::table('items')
            ->join('categories', 'items.item_category', '=', 'categories.id')
            ->select('item_name', 'item_content', 'image', 'category_name', 'items.id', 'price');

        if (!empty($q)) {
            $query->where('item_name', 'like', '%' . $q . '%')
                ->orWhere('item_content', 'like', '%' . $q . '%')
                ->orWhere('category_name', 'like', '%' . $q . '%')
                ->get();
        }
        $results = $query->paginate(4);

        return view('SearchItem', compact('results', 'q', 'message'));
    }
}
//        SELECT item_name,item_content,image,categories.category_name FROM `items` INNER JOIN `categories` ON items.item_category = categories.id
