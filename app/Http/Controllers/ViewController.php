<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Card;

class ViewController extends Controller
{
    public function showHome()
    {
        $total = Card::count();
        // dd();
        return Inertia::render('Home/Index', [
            'totalCardNum' => $total,
        ]);
    }

    public function showDetail($id)
    {
        $Card = Card::find($id);
        // dd();
        return Inertia::render('Detail/Show', [
            'current' => $Card,
        ]);
    }

    public function showManage()
    {
        // dd();
        return Inertia::render('Manage/Index', ['totalCardNum' => $total,
        ]);
    }
}
