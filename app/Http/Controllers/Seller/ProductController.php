<?php

namespace App\Http\Controllers\Seller;

use App\Product;
use Illuminate\Support\Str;
use PHPUnit\TextUI\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $product = Product::where('seller_id', auth('seller')->user()->id)
        ->latest()
        ->paginate(6);
        return view('website.seller.product.index', compact('product'));
    }
    public function create(){
        return view('website.seller.product.create');
    }
    public function store(ProductRequest $request){
        $model = new Product();
        $attr = $request->validated();
        $attr['seller_id'] = auth('seller')->user()->id;
        $attr['slug'] = Str::slug($attr['name']).'-'.$this->slug_suffle();
        if($request->has('images')){
            $attr['images'] = $model->handleFoto($request);
        }
        try{
            $model->create($attr);
            return back()->withSuccess('Produk baru telah ditambahkan!');
        }catch(Exception $e){
            return back()->withErrors('Error : '.$e->getMessage());
        }
    }
    public function edit(Product $product){
        $this->checkUser($product);
       return view('website.seller.product.edit', compact('product'));
    }
    public function update(ProductRequest $request, Product $product){
        $model = new Product();
        $this->checkUser($product);
        $attr = $request->validated();
        if($request->has('images')){
            $attr['images'] = $model->updateFoto($request, $product->images);
        }
        try{
            $product->update($attr);
            return back()->withSuccess('Produk baru telah diubah!');
        }catch(Exception $e){
            return back()->withErrors('Error : '.$e->getMessage());
        }
    }
    public function destroy(Product $product){
        $this->checkUser($product);
        try{
            $product->delete();
            return back()->withSuccess('Produk telah dihapus!');
        }catch(Exception $e){
            return back()->withErrors('Error: '.$e->getMessage());
        }
    }
    /*  */
    public function slug_suffle(){
        $str = rand(100,999).Str::random(3);
        $str = str_shuffle($str);
        return $str;
    }
    public function checkUser($product){
        if(auth('seller')->user()->id != $product->seller_id){ /* Mencegah user menghapus product bukan miliknya */
            abort(404);
        }
    }
}
