<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;

class TopController extends Controller
{
    public function index()
    {

        $item = DB::table('items')->where(['recommend_flag', '=', '1'])->get();
        dd($item);
        return view('index',[
            'item' => $item
        ]);
    }

}
