<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index (){

      return redirect()->route('index');
    }

    public function pagination () {
        $recommend_items = Item::all();
    }
}
