<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function login(): View
    {
        return view("admin.login");
    }

    public function authAdmin(Request $request): RedirectResponse
    {
        $valid = $request->validate([
            "email" => "required|email",
            "password" => 'required'
        ]);

        if (Auth::guard('admin')->attempt($valid)) {
            $request->session()->regenerate();
            return redirect('/admin/dashbord');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashbord(): View
    {
        $users = User::strictUser()->get();
        $seller = Seller::all();
        return view("admin.dashbord",["userList" => $users,"sellerList" => $seller]);
    }

    public function createSeller(): View
    {
        return view("admin.addSeller");
    }
    public function validingSeller(Request $request): RedirectResponse
    {
        $valid = $request->validate([
            "name" => "required|alpha:ascii",
            "email" => "required|email",
            "password" => "required"
        ]);

        $seller = Seller::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password")),
        ]);

        return redirect("/admin/dashbord/addSeller");
    }

    public function logout(Request $request): RedirectResponse 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
