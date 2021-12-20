<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function  deedCreateitem (Request $id) {

        return view('item/deedCreateItem');
    }
}
