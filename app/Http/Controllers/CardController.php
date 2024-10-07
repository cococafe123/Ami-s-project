<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AddCardRequest;
use App\Models\Card;
use Inertia\Inertia;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class CardController extends Controller
{
    public function store(AddCardRequest $request)
    {

        $data = $request->validated();

        if ($data['img']) {

            $manager = new ImageManager(new Driver());

            $image = $manager->read($data['img']);

            $ratio = $image->width() / $image->height();

            if ($ratio > 1.1) {
                $image->cover(256, 145);
                $data['height'] = 145;
            } else if ($ratio < 1.1 && $ratio > 0.75) {
                $image->cover(256, height: 307);
                $data['height'] = 307;
            } else {
                $image->cover(176, height: 288);
                $data['height'] = 288;
            }

            $imageName = Str::random(10) . '.' . $data['img']->getClientOriginalExtension();

            Storage::disk('public')->put('img/' . $imageName, (string) $image->encode());

            $url = Storage::disk('public')->url('img/' . $imageName);
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
