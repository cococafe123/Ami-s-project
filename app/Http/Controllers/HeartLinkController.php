<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HeartLinkController extends Controller
{
    //
    public function showHome()
    {
        return Inertia::render('HeartHome/Index', [
            
        ]);
    }
}
