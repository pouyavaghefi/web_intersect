<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class FriendController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        $users = User::where('name', 'like', "%{$query}%")
            ->where('id', '!=', auth()->id())
            ->get();

        return response()->json($users);
    }
}
