<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Models\Social\ChatUser;
use App\Models\Social\Conversation;
use App\Models\Social\ConversationMember;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * Create or open a single chat with the selected user
     */
    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $currentUserId = Auth::id();
        $otherUserId = $request->input('user_id');

        if ($currentUserId == $otherUserId) {
            return redirect()->back()->with('error', 'You cannot start a chat with yourself.');
        }

        $conversation = Conversation::where('is_group', false)
            ->whereHas('members', function($q) use ($currentUserId) {
                $q->where('user_id', $currentUserId);
            })
            ->whereHas('members', function($q) use ($otherUserId) {
                $q->where('user_id', $otherUserId);
            })
            ->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'is_group' => false,
            ]);

            ConversationMember::create([
                'conversation_id' => $conversation->id,
                'user_id' => $currentUserId,
            ]);

            ConversationMember::create([
                'conversation_id' => $conversation->id,
                'user_id' => $otherUserId,
            ]);
        }

        return redirect()->route('chat.show', $conversation->id);
    }

    public function show($id)
    {
        $user = auth()->user();

        $conversation = Conversation::with(['members', 'messages.sender'])
            ->findOrFail($id);

        $messages = $conversation->messages()->with('sender')->get();

        $otherUser = $conversation->is_group
            ? null
            : $conversation->members()
                ->where('users.id', '!=', auth()->id())
                ->first();

        $conversations = $user->conversations()
            ->with([
                'lastMessage.sender',
                'members' => fn($q) => $q->where('users.id', '!=', $user->id) // ✅ fix here
            ])
            ->get();

        $conversationsNum = count($conversations);

        return view('services.chat-room.show', compact('conversation', 'messages', 'otherUser', 'conversations', 'conversationsNum'));
    }
}
