<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "sender_id",
        "reciever_id"
    ];

    public function user(){
        return $this->belongsTo(User::class, "reciever_id");
    }

    public function sender(){
        return $this->belongsTo(User::class, "sender_id");
    }
}
