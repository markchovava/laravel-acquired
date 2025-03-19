<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'business_id',
        'status',
        'amount_paid',
        'status',
        'expiry_date',
        'created_at',
        'updated_at',
    ];


    public function business(){
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
