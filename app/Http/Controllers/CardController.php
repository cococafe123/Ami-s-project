<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AddCardRequest;
use App\Models\Card;
use Inertia\Inertia;

class CardController extends Controller
{
    public function store(AddCardRequest $request)
    {

        $data = $request->validated();

        if ($data['img']) {
            $url = Storage::disk('public')->url($data['img']->store('img', 'public'));
            $relativeUrl = Str::after($url, config('app.url'));
            $data['img'] = $relativeUrl;
        }

        $card = Card::create($data);

        $card->save();
        return Inertia::location(route('home'));
    }

    public function destroy($id)
    {
        $card = Card::find($id);
        if ($card === null) {
            abort(404);
        }
        $card->delete();

        return Inertia::location(route('home'));
    }
}
