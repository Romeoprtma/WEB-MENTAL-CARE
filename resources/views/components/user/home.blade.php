@extends('layouts.main')
@section('home')

{{-- Home --}}
<section class="flex flex-col lg:flex-row justify-between items-center bg-[#756AB6] px-4 lg:px-24 py-16 lg:py-20 min-h-screen w-full">
    <div class="lg:w-1/2 text-white text-center lg:text-left mb-10 lg:mb-0">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">MentalCare</h1>
        <p class="text-lg leading-relaxed max-w-xl mx-auto lg:mx-0">
            Temukan solusi kesehatan mental terintegrasi di satu platform. Nikmati meditasi dengan musik menenangkan,
            tes kepribadian, video edukasi, hingga konsultasi langsung dengan ahli. Bersama kami, jadikan kesejahteraan
            mentalmu prioritas utama.
        </p>
    </div>
    <div class="lg:w-1/2 flex justify-center lg:justify-end">
        <img src="{{ asset('/img/icon_hero.svg') }}" alt="Icon Hero" class="w-72 md:w-96 lg:w-[481px] lg:h-[469px] max-w-full h-auto" />
    </div>
</section>

{{-- About --}}
<section id="about" class="bg-white dark:bg-gray-900 px-4 md:px-10 lg:px-24 py-16 min-h-screen w-full flex items-center">
    <div class="flex flex-col-reverse lg:flex-row items-center gap-12 w-full">
        <div class="lg:w-1/2 text-center lg:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-6">Tentang Kami</h2>
            <p class="text-gray-700 dark:text-gray-300 text-justify">
                Mental Care adalah platform kesehatan mental yang menyediakan fitur meditasi lewat musik, tes kepribadian,
                video edukasi, dan konsultasi. Melalui layanan ini, pengguna dapat menenangkan pikiran, memahami diri lebih baik,
                serta mendapatkan edukasi dan dukungan profesional untuk menjaga kesehatan mental.
            </p>
            <div class="flex flex-wrap justify-center lg:justify-start gap-4 mt-6 text-gray-700 dark:text-gray-300">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('/img/instagram.png') }}" alt="Instagram" class="w-6 h-6">
                    <span>Instagram</span>
                </div>
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('/img/wa.png') }}" alt="WhatsApp" class="w-6 h-6">
                    <span>WhatsApp</span>
                </div>
            </div>
            <div class="mt-8">
                <a href="#konsul">
                    <button
                        class="bg-transparent border-2 border-blue-600 text-blue-600 dark:border-white dark:text-white px-6 py-2 rounded-lg hover:bg-blue-600 hover:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                        Temukan Psikolog Terbaik
                    </button>
                </a>
            </div>
        </div>
        <div class="lg:w-1/2 flex justify-center">
            <img src="{{ asset('/img/icon_about.png') }}" alt="Icon About"
                class="w-48 md:w-64 lg:w-[481px] lg:h-[469px] max-w-full h-auto" />
        </div>
    </div>
</section>

{{-- List psikolog terbaik --}}
@auth
    @if(Auth::user()->role === 'user')
        {{-- Section untuk user --}}
        <section id="konsul" class="flex justify-center items-center min-h-screen bg-[#756AB6] px-4 md:px-8 w-full">
            <div class="py-4 w-full max-w-5xl">
                <div class="text-center mb-6">
                    <h1 class="text-2xl sm:text-3xl font-semibold text-white">Psikolog Terbaik</h1>
                    <h3 class="text-lg sm:text-xl mt-2 text-white">Pilih sesuai kemauanmu!</h3>
                </div>
                <div class="grid justify-center grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-black">
                    @foreach ($psikolog as $item)
                    <div class="card bg-base-100 rounded shadow-xl dark:text-white bg-gray-100 dark:bg-[#432E54] p-3 sm:p-4 h-full">
                        <figure class="px-4 pt-4">
                            {{-- PERBAIKAN UTAMA DI SINI --}}
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="Foto {{ $item->name }}"
                                class="rounded-xl w-full h-60 object-cover" />
                        </figure>
                        <div class="card-body items-center text-center px-2">
                            <h2 class="card-title text-md sm:text-lg font-bold mt-2">{{ $item->name }}</h2>
                            <div class="card-actions mt-4">
                                <a href="{{ route('user.chat', ['userId' => $item->id]) }}">
                                    <button class="border-2 font-bold border-blue-500 px-3 py-1 text-[#756AB6] rounded hover:bg-blue-500 hover:text-white dark:border-gray-300 dark:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                                        Booking Konsultasi
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-center mt-16 text-lg sm:text-xl md:text-2xl dark:text-white text-white">
                    <a href="{{ url('user/listPsikolog') }}" class="hover:underline">Lihat Psikolog Lainnya →</a>
                </div>
            </div>
        </section>
    @elseif(Auth::user()->role === 'psikolog')
        {{-- Section khusus untuk psikolog --}}
        <section class="flex justify-center items-center min-h-screen bg-[#756AB6] px-4 md:px-8 w-full">
            <div class="w-full max-w-6xl py-10">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Selamat datang, {{ Auth::user()->name }}!</h1>
                    <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Berikut adalah daftar user yang pernah berkonsultasi dengan Anda:</p>
                </div>
                {{-- Table konsultasi bisa diatur height-nya jika ingin scroll --}}
            </div>
        </section>
    @endif
@else
    {{-- Section untuk guest (belum login) --}}
    <section id="konsul" class="flex justify-center items-center min-h-screen bg-[#756AB6] px-4 md:px-8 w-full">
        <div class="py-4 w-full max-w-5xl">
            <div class="text-center mb-6">
                <h1 class="text-2xl sm:text-3xl font-semibold text-white">Psikolog Terbaik</h1>
                <h3 class="text-lg sm:text-xl mt-2 text-white">Pilih sesuai kemauanmu!</h3>
            </div>
            <div class="grid justify-center grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-black">
                @foreach ($psikolog as $item)
                <div class="card bg-base-100 rounded shadow-xl dark:text-white bg-gray-100 dark:bg-[#432E54] p-3 sm:p-4 h-full">
                    <figure class="px-4 pt-4">
                        {{-- PERBAIKAN UTAMA DI SINI --}}
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="Foto {{ $item->name }}"
                            class="rounded-xl w-full h-60 object-cover" />
                    </figure>
                    <div class="card-body items-center text-center px-2">
                        <h2 class="card-title text-md sm:text-lg font-bold mt-2">{{ $item->name }}</h2>
                        <div class="card-actions mt-4">
                            {{-- Perbaikan: Menggunakan URL langsung ke rute login --}}
                            <a href="{{ route('login') }}">
                                <button class="border-2 font-bold border-blue-500 px-3 py-1 text-[#756AB6] rounded hover:bg-blue-500 hover:text-white dark:border-gray-300 dark:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                                    Booking Konsultasi
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-center mt-16 text-lg sm:text-xl md:text-2xl dark:text-white text-white">
                 {{-- Perbaikan: Menggunakan URL langsung --}}
                <a href="{{ url('/listPsikolog') }}" class="hover:underline">Lihat Psikolog Lainnya →</a>
            </div>
        </div>
    </section>
@endauth

{{-- User Review --}}
<section id="reviews" class="min-h-screen py-12 px-4 bg-gray-100 dark:bg-gray-900 w-full flex items-center">
    <div class="max-w-4xl mx-auto w-full">
        @if(Auth::check() && Auth::user()->role == 'user')
            <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white text-center mb-8">
                Berikan Komentar terhadap Website kami
            </h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Berikan Pengalamanmu
                </h3>
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf
                    <div class="flex items-center mb-6">
                        <label for="rating" class="text-gray-800 dark:text-gray-200 font-medium mr-4">Berikan Rating untuk Website kami</label>
                        <div id="rating-group" class="flex space-x-2">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button"
                                    class="rating-btn text-gray-300 hover:text-yellow-500 text-2xl focus:outline-none"
                                    data-value="{{ $i }}">★</button>
                            @endfor
                        </div>
                        <input type="hidden" id="rating" name="rating" value="">
                    </div>
                    <div class="mb-6">
                        <label for="review" class="block text-gray-800 dark:text-gray-200 font-semibold mb-2">Komentar kamu:</label>
                        <textarea id="review" name="review" rows="4"
                            class="w-full p-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white resize-none"
                            placeholder="Berikan Komentar..."></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit"
                            class="bg-blue-600 text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        @endif

        <div class="mt-12">
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                Komentar Pengguna
            </h3>
            <div class="space-y-6">
                @forelse($reviews as $review)
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                        <div class="flex items-center mb-2">
                            <span class="font-bold text-gray-800 dark:text-white">{{ $review->user->name }}</span>
                            <span
                                class="ml-auto text-sm text-gray-500 dark:text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                <span
                                    class="{{ $i <= $review->rating ? 'text-yellow-500' : 'text-gray-300' }} text-lg">★</span>
                            @endfor
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $review->review }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-800 dark:text-gray-300 text-center">
                        Belum ada yang berkomentar. Ayo jadi yang pertama!
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<div id="chatbot-container" class="fixed bottom-4 right-4 z-50">
    <button id="chatbot-toggle" class="bg-white text-[#756AB6] text-xl p-3 rounded-full shadow-xl border border-[#756AB6] hover:bg-[#f0f0f0] focus:outline-none">
        🗨️
    </button>

    <div id="chat-window" class="hidden mt-2 w-80 h-[500px] bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden flex flex-col">
        <div class="p-4 border-b bg-[#756AB6] text-white font-bold">MentalCare Bot</div>
        <div id="chat-messages" class="flex-1 p-4 overflow-y-auto space-y-3 bg-gray-100 dark:bg-gray-700 text-sm">
            </div>
        <form id="chat-form" class="flex border-t bg-white dark:bg-gray-800">
            <input type="text" name="message" id="chat-input" placeholder="Tulis pesan..."
                class="flex-1 p-3 text-sm focus:outline-none text-gray-800 dark:text-white dark:bg-gray-700"
                autocomplete="off" />
            <button type="submit" class="bg-[#756AB6] text-white px-4">Kirim</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// Rating Stars Handler
document.addEventListener('DOMContentLoaded', function () {
    const ratingBtns = document.querySelectorAll('.rating-btn');
    const ratingInput = document.getElementById('rating');

    ratingBtns.forEach((btn) => {
        btn.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;

            ratingBtns.forEach((star, index) => {
                star.classList.toggle('text-yellow-500', index < value);
                star.classList.toggle('text-gray-300', index >= value);
            });
        });
    });
});

// SweetAlert for session success
@if (session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        customClass: {
            confirmButton: 'btn-confirm'
        }
    });
@endif

// Chatbot Logic
document.getElementById('chatbot-toggle').addEventListener('click', () => {
    document.getElementById('chat-window').classList.toggle('hidden');
});

document.getElementById('chat-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    if (!message) return;

    appendMessage('Kamu', message);
    input.value = ''; // Kosongkan input segera
    appendLoading();

    try {
        const response = await fetch('/chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ message })
        });

        const data = await response.json();
        removeLoading();
        appendMessage('MentalCare Bot', data.reply);
    } catch (error) {
        removeLoading();
        appendMessage('MentalCare Bot', 'Maaf, terjadi kesalahan. Coba lagi nanti.');
    }
});

function appendMessage(sender, message) {
    const msgContainer = document.getElementById('chat-messages');
    const bubble = document.createElement('div');

    bubble.classList.add(
        'max-w-[80%]', 'px-4', 'py-2', 'rounded-lg', 'shadow',
        'whitespace-pre-line', 'text-sm', 'break-words'
    );
    
    // PERBAIKAN: Syntax if/else yang salah telah diperbaiki
    if (sender === 'Kamu') {
        bubble.classList.add('bg-blue-600', 'text-white', 'ml-auto', 'text-right');
    } else {
        bubble.classList.add('bg-white', 'text-gray-800', 'mr-auto', 'text-left', 'dark:bg-gray-600', 'dark:text-white');
    }

    bubble.innerHTML = `<strong>${sender}:</strong><br>${message}`;
    msgContainer.appendChild(bubble);
    msgContainer.scrollTop = msgContainer.scrollHeight;
}

function appendLoading() {
    const msgContainer = document.getElementById('chat-messages');
    const loadingBubble = document.createElement('div');
    loadingBubble.id = 'loading-indicator';
    loadingBubble.classList.add('text-sm', 'text-gray-500', 'italic', 'mr-auto');
    loadingBubble.textContent = 'MentalCare Bot sedang mengetik...';
    msgContainer.appendChild(loadingBubble);
    msgContainer.scrollTop = msgContainer.scrollHeight;
}

function removeLoading() {
    const loadingBubble = document.getElementById('loading-indicator');
    if (loadingBubble) {
        loadingBubble.remove();
    }
}
</script>

@endsection