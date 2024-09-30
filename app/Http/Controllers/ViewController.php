<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Card;

class ViewController extends Controller
{
    public function showHome()
    {
        $Card = Card::take(20)->get();
        // dd();
        return Inertia::render('Home/Index', [
            'card' => $Card,
        ]);
    }
}
