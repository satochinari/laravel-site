<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsrfController extends Controller
{
    public function index()
    {
        return view('csrf');
    }
    public function photo()
    {
        return view('photo');
    }
}
