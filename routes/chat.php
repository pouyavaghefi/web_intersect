<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Social\ChatController;
use App\Http\Controllers\Social\FriendController;
use Illuminate\Support\Facades\Session;

Route::get('/chat-room/demo', function () {
    return view('services.chat-room.demo');
});

Route::get('/chat-room/home', function () {
    if (auth()->check()) {
        if (is_null(auth()->user()->username)) {
            Session::put('usrNameNotSetYet', '1');
        }
    } else {
        return redirect('/login');
    }

    $user = Auth::user();

    $conversations = $user->conversations()
        ->with([
            'lastMessage.sender',
            'members' => fn($q) => $q->where('users.id', '!=', $user->id) // ✅ fix here
        ])
        ->get();

    $conversationsNum = count($conversations);

    return view('services.chat-room.index', compact('conversations','conversationsNum'));
});

Route::post('/chat-room/home', function (Request $request) {
    $user = auth()->user();
    $user->username = $request->input('username');
    $user->save();

    Session::forget('usrNameNotSetYet');

    return redirect()->back()->with('usrNameJustSet',1);
})->name('set.username');

Route::get('/chat-room/search-users', function(Request $request) {
    $q = $request->input('q', '');

    if (!$q) {
        return response()->json([]);
    }

    $users = User::where('username', 'like', "%{$q}%")
        ->orWhere('name', 'like', "%{$q}%")
        ->limit(10)
        ->get(['id', 'username', 'name']);

    return response()->json($users);
});

Route::post('/chat-room/create', [ChatController::class, 'create'])->name('chat.create');
Route::get('/chat-room/show/{conversation}', [ChatController::class, 'show'])->name('chat.show');
