<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessMessage extends Model
{
    protected $fillable = [
        'id',
        'business_id',
        'user_id',
        'name',
        'phone',
        'email',
        'timeframe',
        'message',
        'status',
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
