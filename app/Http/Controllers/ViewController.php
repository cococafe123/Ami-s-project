<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
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

    public function showAbout()
    {
        return Inertia::render('About/Show', [

        ]);
    }

    public function showDetail( $id )
    {
        return Inertia::render('Detail/Edit', [
            
        ]);
    }
    //
}
