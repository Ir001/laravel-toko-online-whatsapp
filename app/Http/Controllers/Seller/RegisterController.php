<?php

namespace App\Http\Controllers\Seller;

use Exception;
use App\Seller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('website.seller.signup');
    }
    public function register(){
        $rules = [
            'name' => 'required|min:3|max:35',
            'email' => 'required|email|unique:sellers',
            'password' => 'required|confirmed',
            'aggree' => 'required',
        ];
        $messages = [
            'name.required' => 'Nama toko wajib diisi!',
            'name.min' => 'Nama toko setidaknya memiliki 3 karakter',
            'name.max' => 'Nama toko maksimal 35 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid, periksa kembali!',
            'email.unique' => 'Maaf, email sudah terdaftar. <a href="/login/seller">Masuk</a>',
            'password.required' => 'Kata sandi wajib diisi',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok, periksa kembali!',
            'aggree.required' => 'Anda harus menyetujui <a href="/p/syarat-dan-ketentuan">S&K</a> yang berlaku!',
        ];
        $validator = Validator::make(request()->all(),$rules,$messages);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        try{
            Seller::create([
                'slug' => Str::slug(request()->name).'-'.rand(99,999),
                'name' => ucwords(Str::lower(request()->name)),
                'email' => Str::lower(request()->email),
                'password' => Hash::make(request()->password),
            ]);
        }catch(Exception $e){
            return back()->withErrors('Invalid server error!'. $e->getMessage());
        }
        return back()->withSuccess('Akun Anda Telah Terdaftar, Periksa Email Anda Untuk Konfirmasi Alamat Email');
    }
}
