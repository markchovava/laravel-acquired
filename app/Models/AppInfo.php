<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppInfo extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'address',
        'phone',
        'email',
        'website',
        'facebook',
        'twitter',
        'whatsapp',
        'description',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
