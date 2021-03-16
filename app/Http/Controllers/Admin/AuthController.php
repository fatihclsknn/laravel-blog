<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ]);
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            } else {
                $errors = ['email' => 'Hatalı giriş'];
                return back()->withErrors($errors);
            }

        }

        return view('admin.auth.login');
    }

    public function register(Request $request)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:2|max:20|string',
                'lastName' => 'required|min:2|max:25|string',
                'email' => 'required|email|unique:users',
                'password'=>'required|confirmed|min:6|max:20',
            ]);
            $user = User::create([
                'name'=>$request->name,
                'lastName'=>$request->lastName,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            return  redirect()->route('admin.login');
        }
        return view('admin.auth.register');
    }
}
