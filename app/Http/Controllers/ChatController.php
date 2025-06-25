<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\User;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $psikolog = auth()->user();

        if ($psikolog->role !== 'psikolog') {
            abort(403);
        }

        // Ambil user yang pernah terlibat chat dengan psikolog
        $userIds = Message::where('from_user_id', $psikolog->id)
            ->orWhere('to_user_id', $psikolog->id)
            ->pluck('from_user_id')
            ->merge(
                Message::where('to_user_id', $psikolog->id)->pluck('from_user_id')
            )
            ->unique()
            ->filter(fn ($id) => $id !== $psikolog->id);

        $users = User::whereIn('id', $userIds)->get();

        return view('components.psikolog.chat.riwayatChat', compact('users'));
    }

}
