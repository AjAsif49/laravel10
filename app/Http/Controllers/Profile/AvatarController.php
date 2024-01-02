<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;

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
}
