<?php

namespace App\Models\Social;

use Illuminate\Database\Eloquent\Model;
use App\Models\Social\ChatUser;

class ConversationMember extends Model
{
    protected $fillable = ['conversation_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(ChatUser::class, 'user_id');
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
