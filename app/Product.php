<?php

namespace App;

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
}
