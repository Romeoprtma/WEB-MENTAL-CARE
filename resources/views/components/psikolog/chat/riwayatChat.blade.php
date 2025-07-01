@extends('layouts.mainPsikolog')

@section('riwayatChat')
<div class="max-w-4xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Riwayat Chat</h1>

    @forelse ($users as $user)
    <a href="{{ url(Auth::user()->role.'/chat/'.$user->id) }}">
        <div class="p-4 mb-4 bg-white rounded-lg shadow-sm flex items-start space-x-4 hover:bg-gray-50">
            {{-- Avatar --}}
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=4f46e5&color=fff"
                class="w-12 h-12 rounded-full" alt="avatar">
            {{-- User Info --}}
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <h2 class="text-md font-semibold text-gray-900">{{ $user->name }}</h2>
                    @if($user->lastMessage)
                        <span class="text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($user->lastMessage->created_at)->diffForHumans() }}
                        </span>
                    @endif
                </div>

                <p class="text-gray-600 text-sm">{{ $user->email }}</p>

                {{-- Last message --}}
                <span class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-800 inline-block mt-1">
                    {{ $user->lastMessage ? Str::limit($user->lastMessage->message, 30) : 'Belum ada pesan' }}
                </span>
            </div>
        </div>
    </a>
    @empty
    <p class="text-gray-500 text-center">Belum ada riwayat chat.</p>
    @endforelse
</div>
@endsection
