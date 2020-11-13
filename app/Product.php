<?php

namespace App;

use Exception;
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

    public function updateFoto($request, $images){
        $img = $request->file('images');
        $filename = Str::slug($request->name).time().".".$img->extension();
        $filepath = $request->images->storeAs('uploads/products', $filename,'public');
        try{
            unlink(public_path($images));
            unlink(asset($images));
            return "/storage/{$filepath}";
        }catch(Exception $e){
            return "/storage/{$filepath}";
        }
    }
}
