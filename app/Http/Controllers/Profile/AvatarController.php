<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarUpdateResuest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{

    /**
     * Update the specified resource in storage.
     */
    public function update(AvatarUpdateResuest $request)
    {
        // $data = $request->validate([
        //     'avatar'=> 'required | image'
        //     // 'avatar'=> ['required', 'image']
        // ]);

          $path = $request->file('avatar')->store('avatars', 'public');
          auth()->user()->update(['avatar' => $path]);
        //   auth()->user()->update(['avatar' => storage_path($path)]);
        //   dd(auth()->user());
        // dd($request->all());
        // dd($request->input('_token'));



        // $note->update($data);

        // return redirect()->route('note.index')->with('message','Note was updated');
        return back()->with('message','Avatar is changed');
        // return response()->redirectTo(route('profile.edit'));
    }
}
