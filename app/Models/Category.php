<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function businesses(){
        return $this->belongsToMany(Business::class, 'business_categories', 'category_id', 'business_id')
            ->withTimestamps();
    }
}
