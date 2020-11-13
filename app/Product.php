<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'seller_id',
        'category_id',
        'name',
        'slug',
        'price',
        'images',
        'description',
    ];
    public function Category(){
        return $this->belongsTo('App\CategoryProduct');
    }


    //
    public function handleFoto($request){
        $img = $request->file('images');
        $filename = Str::slug($request->name).time().".".$img->extension();
        $filepath = $request->images->storeAs('uploads/products', $filename,'public');
        return "/storage/{$filepath}";
    }
}
