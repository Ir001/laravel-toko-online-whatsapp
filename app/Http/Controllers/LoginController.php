<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index($slug=null){
        switch ($slug) {
            case null:
            case 'buyer':
                return view('website.buyer.login');
                break;
            case 'seller':
                return view('website.seller.login');
                break;
            default:
                abourt(404);
                break;
        }
    }
}
