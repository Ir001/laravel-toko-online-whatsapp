<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Seller extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table = 'sellers';
    protected $guard = 'seller';
    protected $fillable = [
        'category_id',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'status',
        'is_verified',
        'email',
        'password',
        'name',
        'slug',
        'whatsapp',
        'description',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function Category(){
        return $this->belongsTo('App\CategorySeller');
    }
}
