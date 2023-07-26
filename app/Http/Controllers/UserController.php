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
        if ($user->name === $request->name && $user->email === $request->email) {
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



        return back()
            ->withErrors([
                'success' => 'Updated! Congrats!'
            ]);


    }
}
