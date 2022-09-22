<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Str;
class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:255'
        ]);

        if(Auth::attempt($credentials)){

            if($request->remember){
                Cookie::queue('emailCookie',$request->email,60);
                Cookie::queue('passCookie',$request->password,60);
            }else{
                Cookie::queue(Cookie::forget('emailCookie'));
                Cookie::queue(Cookie::forget('passCookie'));
            }

            $request->session()->regenerate();
            return redirect()->intended('/')->with('alert','Sucessfully login');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function github(){
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect(){
        $user = Socialite::driver('github')->stateless()->user();

        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user,true);
        return redirect()->intended('/')->with('alert','Sucessfully login');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(){
        $user = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user,true);
        return redirect()->intended('/')->with('alert','Sucessfully login');
    }
}
