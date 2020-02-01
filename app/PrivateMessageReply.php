<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class PrivateMessageReply extends Model
{
    protected $fillable = ['private_message_id', 'sender_id', 'message'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function privateMessage()
    {
        return $this->belongsTo(PrivateMessage::class, 'private_message_id');
    }
}
