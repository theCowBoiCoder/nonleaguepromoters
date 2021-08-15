<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'sender_user_id',
        'receiver_user_id',
        'subject',
        'message',
        'has_read',
        'from'
    ];

    public function sender(){
        return $this->belongsTo(User::class,'sender_user_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'receiver_user_id','id');
    }

}
