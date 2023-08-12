<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    //
    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if ($user->name === $request->name && $user->email === $request->email && (!$request->file('avatar'))) {
            return back()
                ->withErrors([
                    'input' => 'Provided data is the same. Nothing to update'
                ]);
        }


        $attributes = $request->validate([
            'avatar' => 'image|mimes:jpeg|max:2048',
            'name' => ['required', Rule::unique('users')->ignore($user)],
            'email' => ['required', Rule::unique('users')->ignore($user)]

        ]);



        $user->update(Arr::except($attributes, ['avatar']));
        if($request->file('avatar') !== null) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }



        return back()
            ->withErrors([
                'success' => 'Updated! Congrats!'
            ]);


    }
}
