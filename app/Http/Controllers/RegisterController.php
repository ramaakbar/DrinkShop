<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function store(Request $request){
        $validated=$request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255|confirmed',
            'password_confirmation' => "required"
        ]);
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        return redirect('/login')->with('alert','Sucessfully Register');
    }
}

