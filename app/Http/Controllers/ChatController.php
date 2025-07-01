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

        // Ambil user yang pernah terlibat chat
        $userIds = Message::where('from_user_id', $psikolog->id)
            ->orWhere('to_user_id', $psikolog->id)
            ->pluck('from_user_id')
            ->merge(
                Message::where('to_user_id', $psikolog->id)->pluck('to_user_id')
            )
            ->unique()
            ->filter(fn ($id) => $id !== $psikolog->id);

        $users = User::whereIn('id', $userIds)->get();

        // Tambahkan pesan terakhir masing-masing user
        foreach ($users as $user) {
            $lastMessage = Message::where(function ($query) use ($psikolog, $user) {
                    $query->where('from_user_id', $psikolog->id)
                        ->where('to_user_id', $user->id);
                })
                ->orWhere(function ($query) use ($psikolog, $user) {
                    $query->where('from_user_id', $user->id)
                        ->where('to_user_id', $psikolog->id);
                })
                ->latest('created_at')
                ->first();

            $user->lastMessage = $lastMessage;
        }

        return view('components.psikolog.chat.riwayatChat', compact('users'));
    }
}
