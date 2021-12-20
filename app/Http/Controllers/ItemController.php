<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function  deedCreateitem (Request $id) {

        return view('item/deedCreateItem');
    }

    public function deedEdititem (Request $request, $id){


        return view('item/deedEditItem');
    }

    public function deedDeleteitem (Request $request, $id){


        return view('item/deedDeleteItem');
    }

}
