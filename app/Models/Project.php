<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function likedBy()
    {
        return $this->likes->contains('user_id', session()->get('id'));
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function findUser()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function findCash()
    {
        return $this->hasMany(Transaction::class,'project_id','id');
    }


}
