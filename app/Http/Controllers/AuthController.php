<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view("pages.login-register.login");
    }
    public function authorized(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = auth()->user();

            $user->last_login_at = now();
            $user->save();

            if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Superadmin') {
                return redirect('admin-dashboard');
            } elseif (auth()->user()->mitra_status == 'Verified') {
                return redirect('mitra-dashboard');
            } else {
                return redirect('customer-dashboard');
            }
        }

        return back()->with('error','email atau password salah');
    }

    public function register(){
        return view('pages.login-register.register');
    }

    public function registration(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function auth(){
        
    }
}
