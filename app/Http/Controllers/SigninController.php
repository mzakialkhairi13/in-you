<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function register(){
        return view('sign-in.register',[
            'title' => 'Register'
        ]);
    }

    public function login(){
        return view('sign-in.login',[
            'title' => 'Login'
        ]);
    }

    public function register_store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:8'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 2;
        User::create($validatedData);

        $request->session()->flash('success', 'Registration success. Please login to signin');
        return redirect('/login');
        // dd($validatedData);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' =>'required|min:8'
        ]);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            //trigger admin dan user
            if($user['role']==1){
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
            else{
                return back()->with('error','Youre not a admin');
            }
        }
        return back()->with('error','Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
