<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function hasproj()
    {
        return $this->hasMany(Project::class);
    }

    public function hassub()
    {
        return $this->hasOne(Subscription::class,'id','subscription_id');
    }
}
