<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopgridController extends Controller
{
    public function index()
    {
        return view('front.home.index');
    }
}
