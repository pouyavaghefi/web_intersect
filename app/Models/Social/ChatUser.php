<?php

namespace App\Models\Social;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ChatUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'chat_users'; // matches your table

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'conversation_members', 'user_id', 'conversation_id');
    }


    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
}
