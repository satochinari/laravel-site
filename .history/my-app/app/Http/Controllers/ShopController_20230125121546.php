<?php

namespace App\Http\Controllers;

use App\Models\Stock;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('shop',compact('stocks'));
    }
}
