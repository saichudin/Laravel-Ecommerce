<?php

namespace App;

use App\PrivateMessageReply;
use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'is_broadcast', 'message'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function replies()
    {
        return $this->hasMany(PrivateMessageReply::class, 'private_message_id');
    }
}
