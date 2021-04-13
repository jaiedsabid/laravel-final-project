<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public function subscription_find()
    {
        return $this->hasOne(User::class,'subscription_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'subscription_id');
    }
}
