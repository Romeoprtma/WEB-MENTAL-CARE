@extends('layouts.mainPsikolog')

@section('riwayatChat')
<div class="max-w-4xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Riwayat Chat</h1>

    @foreach ($user as $message)
    <div class="p-4 mb-4 bg-white rounded-lg shadow-sm flex items-start space-x-4 hover:bg-gray-50">
        {{-- Avatar --}}
        <div>
            <img src="https://ui-avatars.com/api/?name={{ urlencode($message->user->name) }}&background=4f46e5&color=fff"
                class="w-12 h-12 rounded-full" alt="avatar">
        </div>

        {{-- Chat Content --}}
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <h2 class="text-md font-semibold text-gray-900">{{ $message->user->name }}</h2>
                <span class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</span>
            </div>

            <p class="text-gray-700 text-sm mt-1">{{ $message->message }}</p>

            {{-- Role Badge --}}
            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium rounded-full 
                @if ($message->user->role == 'psikolog')
                    bg-green-100 text-green-800
                @elseif ($message->user->role == 'user')
                    bg-blue-100 text-blue-800
                @elseif ($message->user->role == 'admin')
                    bg-yellow-100 text-yellow-800
                @else
                    bg-gray-100 text-gray-800
                @endif
            ">
                {{ ucfirst($message->user->role) }}
            </span>
        </div>
    </div>
    @endforeach

    {{-- Pagination --}}
    {{-- <div class="mt-6">
        {{ $chats->links() }}
    </div> --}}
</div>
@endsection
