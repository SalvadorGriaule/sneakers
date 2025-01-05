<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function create(): View
    {
        return view('user.create');
    }
    public function valid(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'pseudo' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create([
            "name" => $request->input("pseudo"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password"))
        ]);

        $request->session()->put('avatar',Auth::user()->avatar);

        return redirect("/");
    }
    public function login(): View
    {
        return view("user.login");
    }
    public function auth(Request $request): RedirectResponse
    {
        $cred = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($cred)){
            $request->session()->regenerate();
            $request->session()->put('avatar',Auth::user()->avatar);
            return redirect('/');
        } 
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function profile(Request $request): View
    {
        $user = $request->user();
        
        return view('user.profile',[
            'info' => $user
        ]);
    }
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view("user.edit",["info" => $user]);
    }
    public function editing(Request $request): RedirectResponse
    {
        if(!empty($request->input("emailChange"))){
            $valid = $request->validate([
                "email" => ["required","email",'unique:users'],
            ]);
            $user = $request->user();
            $userTarg = User::find($user->id);
            $userTarg->email = $request->input("email");
            $userTarg->save();
            return redirect("/profile");
        }elseif (!empty($request->input("changeAvatar"))){
            $valid = $request->validate([
                "avatarFile" => ["image"]
            ]);
            $path = $request->file('avatarFile')->storePublicly('avatar',"public");
            $user = $request->user();
            $userTarg = User::find($user->id);
            $userTarg->avatar = $path;
            $userTarg->save();
            $request->session()->put('avatar',$user->avatar);
            return redirect("/profile");
        }

    }
    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
