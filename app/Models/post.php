<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function tag(){
        return $this->hasMany(tag::class);
    }

    public function message(){
        return $this->hasMany(message::class);
    }


//scop logic condition
    public function scopePublished($query)
    {
        return $query->where('status' , 1);
    }
    public function userLike(){
        return $this->belongsToMany(user::class);
    }
}
