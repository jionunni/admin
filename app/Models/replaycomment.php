<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replaycomment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function message(){
        return $this->belongsTo(message::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
