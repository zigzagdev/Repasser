<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{
    public function index()
    {
        return redirect()->route('index');
    }

    public function Recommendation($id)
    {
        $recommend = DB::table('items')->get();

        return redirect('/');
    }

}
