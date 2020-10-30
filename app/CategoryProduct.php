<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_products';
    protected $fillable = [
        'name',
        'slug',
    ];
    public function Product(){
        return $this->hasMany('App\Product');
    }
}
