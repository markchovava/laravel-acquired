<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'membership_id',
        'status',
        'amount_paid',
        'status',
        'expiry_date',
        'created_at',
        'updated_at',
    ];

    public function membership(){
        return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
