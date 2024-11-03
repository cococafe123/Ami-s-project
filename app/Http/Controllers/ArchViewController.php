<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArchViewController extends Controller
{
    //
    public function showHome()
    {
        return Inertia::render('ArchHome/Index', [

        ]);
    }

    public function showBlog()
    {
        return Inertia::render('ArchBlog/Show', [

        ]);
    }
}

