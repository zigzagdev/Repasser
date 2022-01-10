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
        return view('index');
    }

}
