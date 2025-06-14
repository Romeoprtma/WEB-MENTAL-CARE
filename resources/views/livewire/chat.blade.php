<section class="bg-white dark:bg-[#563A9C] py-8">
    <div class="flex justify-center p-6">
        <h1 class="text-2xl dark:text-white font-bold">{{ $user->name }}</h1>
    </div>
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Area Chat -->
        <div class="bg-gray-100 dark:bg-[#2d2d4d] p-6 rounded-lg shadow-md max-h-[500px] overflow-y-auto space-y-4" id="chatArea">

            {{-- Loop hanya pada pesan --}}
            @foreach ($messages as $message)
                @if ($message->from_user_id == auth()->id())
                    {{-- Pesan dari User --}}
                    <div class="flex items-end justify-end space-x-3">
                        <div class="bg-gray-300 text-black p-3 rounded-lg max-w-sm">
                            <p>{{ $message->message }}</p>
                            <p class="text-xs text-right text-gray-500 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                        <img class="w-10 h-10 rounded-full object-cover" src="{{ Storage::url(auth()->user()->image ?? 'default.png') }}" alt="User">
                    </div>
                @else
                    {{-- Pesan dari Psikolog --}}
                    <div class="flex items-end space-x-3">
                        <img class="w-10 h-10 rounded-full object-cover" src="{{ Storage::url($user->image) }}" alt="Psikolog">
                        <div class="bg-purple-600 text-white p-3 rounded-lg max-w-sm">
                            <p>{{ $message->message }}</p>
                            <p class="text-xs text-right text-purple-200 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- Kolom Input Pesan -->
        <form wire:submit.prevent="sendMessage" class="flex items-center mt-4 space-x-2">
            <input type="text" wire:model="message" class="flex-1 p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Tulis pesan...">
            <button type="submit" class="bg-purple-700 text-white p-3 rounded-full hover:bg-purple-600 focus:ring-2 focus:ring-purple-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0z" />
                </svg>
            </button>
        </form>
    </div>
</section>
