<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Auth\AdminInfoMail;
use App\Mail\Auth\UserInfoMail;
use App\Models\User;
use Axiom\Rules\DisposableEmail;
use Axiom\Rules\StrongPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
                'status'=>'1'
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
                'email' => ['required','email','unique:users',new DisposableEmail()],
                'password'=>['required','confirmed',new StrongPassword()],
            ]);
            $user = User::create([
                'name'=>$request->name,
                'lastName'=>$request->lastName,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            Mail::to($request->email)->send(new AdminInfoMail($user));
            Mail::to($request->email)->send(new UserInfoMail($user));

            return  redirect()->route('admin.login');
        }
        return view('admin.auth.register');
    }
}
