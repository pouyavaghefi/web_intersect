<?php

namespace App\Models\Social;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Conversation extends Model
{
    protected $fillable = ['name', 'is_group'];

    public function members()
    {
        return $this->belongsToMany(User::class, 'conversation_members', 'conversation_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)->latest();
    }
}

