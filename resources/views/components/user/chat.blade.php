@extends('layouts.main')
@section('chat')
<!-- Halaman Chat Psikolog -->
<section class="bg-white dark:bg-[#563A9C] py-8">
    <!-- Judul -->
    @foreach ($psikologs as $index => $item)
    <div class="flex justify-center p-6">
        <h1 class="text-2xl dark:text-white font-bold">{{ $item->name }}</h1>
    </div>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Area Chat -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <div class="space-y-4 h-96 overflow-auto p-4" id="chatArea">
                <!-- Pesan Psikolog -->
                <div class="flex items-start space-x-3">
                    <img class="w-10 h-10 rounded-full" src="{{ Storage::url($item->image) }}" alt="Psikolog">
                    <div class="bg-purple-500 text-white p-3 rounded-lg">
                        <p>Selamat datang! Ada yang bisa saya bantu hari ini?</p>
                    </div>
                </div>

                <!-- Pesan Pengguna -->
                <div class="flex items-start space-x-3 justify-end">
                    <div class="bg-gray-300 text-black p-3 rounded-lg">
                        <p>Halo, saya ingin berbicara tentang kecemasan saya.</p>
                    </div>
                    <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/150" alt="User">
                </div>

                <!-- Pesan Psikolog -->
                <div class="flex items-start space-x-3">
                    <img class="w-10 h-10 rounded-full" src="{{ Storage::url($item->image) }}" alt="Psikolog">
                    <div class="bg-purple-500 text-white p-3 rounded-lg">
                        <p>Terima kasih telah berbagi. Bisa ceritakan lebih lanjut tentang kecemasan Anda?</p>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Kolom Input Pesan -->
            <div class="flex items-center mt-4 space-x-2">
                <input type="text" id="messageInput" class="flex-1 p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Tulis pesan...">
                <button onclick="sendMessage()" class="bg-purple-700 text-white p-3 rounded-full hover:bg-purple-600 focus:ring-2 focus:ring-purple-500">
                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
<div id="loadingScreen">
    <div class="loader"></div>
</div>
<script>
    // Fungsi untuk mengirim pesan
    function sendMessage() {
        var message = document.getElementById("messageInput").value;
        if (message.trim() !== "") {
            // Menambahkan pesan pengguna ke area chat
            var chatArea = document.getElementById("chatArea");
            var userMessage = document.createElement("div");
            userMessage.className = "flex items-start space-x-3 justify-end";
            userMessage.innerHTML = `
                <div class="bg-gray-300 text-black p-3 rounded-lg">
                    <p>${message}</p>
                </div>
                <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/150" alt="User">
            `;
            chatArea.appendChild(userMessage);

            // Scroll ke pesan terakhir
            chatArea.scrollTop = chatArea.scrollHeight;

            // Kosongkan kolom input pesan
            document.getElementById("messageInput").value = "";
        }
    }
</script>
@endsection
