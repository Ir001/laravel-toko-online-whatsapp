<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySeller extends Model
{
    protected $table = 'category_sellers';
    protected $fillable = [
        'name',
        'slug',
    ];
    public function Seller(){
        return $this->hasMany('App\Seller');
    }
}
