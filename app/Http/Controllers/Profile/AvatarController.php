<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){
        // dd($request->all());
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        // $path = $request->file('avatar')->store('avatars', 'public');
        if($oldavatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldavatar);
        };
        auth()->user()->update(['avatar' => $path]);

        return back()->with(['message' => 'Avatar changed successfully']);
    }

    public function generate(Request $request){

        $result = OpenAI::images()->create([
            "prompt" => "create tech expert avatar ",
            "n" => 1,
            "size" => "256x256"
        ]);

        $contents = file_get_contents($result->data[0]->url);
        $filename = Str::random(25);

        if($oldavatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldavatar);
        };

        Storage::disk('public')->put("avatars/$filename.jpg", $contents);

        auth()->user()->update(['avatar' => "avatars/$filename.jpg"]);

        return back()->with(['message' => 'Avatar changed successfully']);

    }
}
