<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        if(auth('seller')->check()){
            return redirect()->intended(route('seller.dashboard'));
        }
        return view('website.seller.login');
    }
    public function login(Request $request){
        $validator = Validator::make(request()->all(),[
            'email' => 'required',
            'password' => 'required|min:6'
        ],[
            'email.required' => 'Email wajib diisi!',
            'password.required' => 'Kata sandi wajib diisi!',
            'password.min' => 'Kata sandi setidaknya 6 karakter!',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $credentials = ['email' => request()->email, 'password' => request()->password];
        auth('seller')->attempt($credentials);
        if(auth('seller')->check()){
            return redirect()->intended(route('seller.dashboard'));
        }
        return back()->withErrors('Email atau kata sandi salah!');
    }
    public function logout(){
        auth('seller')->logout();
        return redirect()->route('seller.login');
    }
}
