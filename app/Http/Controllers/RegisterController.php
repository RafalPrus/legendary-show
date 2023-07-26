<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email|min:3|max:255|unique:users,email',
            'name' => 'required|min:4|max:255|unique:users,name',
            'password' => 'required|min:3|max:255'
                ]
        );

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/');
    }
}
