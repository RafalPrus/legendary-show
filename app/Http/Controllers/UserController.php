<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if ($request->file('avatar') !== null) {
            $request->validate([
                'avatar' => 'image|mimes:jpeg|max:2048'
            ]);
        }
        if ($user->name === $request->name && $user->email === $request->email && (!$request->file('avatar'))) {
            return back()
                ->withErrors([
                    'input' => 'Provided data is the same. Nothing to update'
                ]);
        } elseif ($user->name === $request->name && $user->email !== $request->email) {
            $attributes = $request->validate([
                'email' => 'required|email|unique:users,email'
            ]);
        } elseif ($user->name !== $request->name && $user->email === $request->email) {
            $attributes = $request->validate([
                'name' => 'required|unique:users,name'
            ]);
        } else {
            $attributes = $request->validate([
                'name' => 'required|unique:users,name',
                'email' => 'required|email|unique:users,email'
            ]);
        }



        $user->update($attributes);
        $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');



        return back()
            ->withErrors([
                'success' => 'Updated! Congrats!'
            ]);


    }
}
