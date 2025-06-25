<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public User $user;
    public $message = '';

    public function mount(User $user)
    {
        $this->user = $user; // ✅ properti sekarang sudah diisi
    }

    public function sendMessage(): void
    {
        Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id'   => $this->user->id,
            'message'      => $this->message,
        ]);

        $this->reset('message');
    }

    public function render()
    {
        $authId = auth()->id();
        $otherId = $this->user->id;

        $messages = Message::where(function ($query) use ($authId, $otherId) {
            $query->where('from_user_id', $authId)
                ->where('to_user_id', $otherId);
        })->orWhere(function ($query) use ($authId, $otherId) {
            $query->where('from_user_id', $otherId)
                ->where('to_user_id', $authId);
        })->orderBy('created_at', 'asc')->get();

        // Cek role untuk menentukan layout
        $layout = auth()->user()->role === 'psikolog'
            ? 'components.psikolog.chat'   // layout untuk psikolog
            : 'components.user.chat';      // layout untuk user

        return view('livewire.chat', [
            'messages' => $messages,
        ])->layout($layout);
    }
}
