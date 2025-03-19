<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'city_id',
        'province_id',
        'image',
        'name',
        'description',
        'price',
        'address',
        'phone',
        'email',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function province() {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'business_categories', 'business_id', 'category_id')
            ->withTimestamps();
    }

    public function business_details(){
        return $this->hasMany(BusinessDetail::class, 'business_id', 'id');
    }
}
