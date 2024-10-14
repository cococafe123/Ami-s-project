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
                $image->cover($image->width(), $image->width() * 145 / 256);
                $data['height'] = 145;
            } else if ($ratio < 1.1 && $ratio > 0.75) {
                $image->cover($image->width(), height: $image->width() * 307 / 256);
                $data['height'] = 307;
            } else {
                $image->cover($image->width(), height: $image->width() * 288 / 176);
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
        return to_route('home');

    }

    public function destroy($id)
    {
        $card = Card::find($id);
        if ($card === null) {
            abort(404);
        }
        $card->delete();

        return to_route('manage');
    }

    public function index($request){
        $validated = $request->validate([
            'index'=>['unsignedInteger','required'],
            'get'=>['unsignedInteger','required']
        ]);

        $cards = Card::skip($request->index)->take($request->get);

        return responce()->json(['cards'=>$cards],200);
    }

    public function update($request,$id){
        $card = Card::findOrFail($id);
        $validated = $request->validate([
            'like'=> ['required','boolean']
        ]);
        if($request->like){
            $card['like']+=1;
        }else{
            $card[like]-=1;
        }
       
        return response()->json(['card'=>$card],200);
    }
}
