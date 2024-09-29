<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ViewController extends Controller
{
    public function showHome()
    {
        return Inertia::render('Home/Index', [

        ]);
    }
}
