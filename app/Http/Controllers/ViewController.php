<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function showHome()
    {
        return Inertia::render('Home/Index', [

        ]);
    }

    public function showShop()
    {
        return Inertia::render('Shop/Index', [

        ]);
    }
    //
}
