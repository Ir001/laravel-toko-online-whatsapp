<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('website.seller.product.index');
    }
    public function create(){
        return view('website.seller.product.create');
    }
    public function store(ProductRequest $request){
        if($request->fails()){
            return back()->withErrors($request);
        }
        // dd($request->all(0));
    }
}
