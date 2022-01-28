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
        $q2 = $request->input('item_category');

        $query = DB::table('items')
            ->join('categories', 'items.item_category', '=', 'categories.id')
            ->select('item_name', 'item_content', 'image', 'category_name', 'items.id', 'price');

        if (!empty($q) && empty($q2) && empty($q3)) {
            $query->where('item_name', 'like', '%' . $q . '%')
                ->orWhere('item_content', 'like', '%' . $q . '%')
                ->get();
        }

        if (empty($q) && !empty($q2) && empty($q3)) {
            $query->where('category_name','like', '%' . $q2 . '%')
                  ->get();
        }

        if (!empty($q) && !empty($q2) && empty($q3)) {
            $query->where('category_name', 'like', '%' . $q2);
            $query->where('item_name', 'like', '%' . $q . '%')
                ->orwhere('item_content', 'like', '%' . $q . '%');
        }

        if (!empty($q) && !empty($q2) ) {
            $query->where('category_name', 'like', '%' . $q2);
            $query->where('item_name', 'like', '%' . $q . '%')
                ->orwhere('item_content', 'like', '%' . $q . '%');
        }

        $result = $query->get();
        $results = $query->paginate(4);

        return view('SearchItem', compact('results', 'q', 'message', 'q2', 'result'));
    }


}
//        SELECT item_name,item_content,image,categories.category_name FROM `items` INNER JOIN `categories` ON items.item_category = categories.id
