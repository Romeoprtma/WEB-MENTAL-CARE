@extends('layouts.main')
@section('home')

{{-- Home --}}
<section class="flex flex-col lg:flex-row justify-between items-center bg-[#756AB6] px-4 lg:px-20 h-auto lg:h-[668px] py-10 lg:py-0">
    <!-- Text Section -->
    <div class="title-hero text-center lg:text-left text-white mb-6 lg:mb-0 lg:ml-20">
        <h1 class="text-[42px] font-bold">MentalCare</h1>
        <h3 class="py-2 max-w-[500px] mr-[54px]">Temukan solusi kesehatan mental terintegrasi di satu platform. Nikmati meditasi dengan musik menenangkan, tes kepribadian, video edukasi, hingga konsultasi langsung dengan ahli. Bersama kami, jadikan kesejahteraan mentalmu prioritas utama.</h3>
    </div>
    <!-- Image Section -->
    <div class="img-hero flex justify-center lg:justify-end w-full lg:w-auto">
        <img src="{{asset('/img/icon_hero.svg')}}" class="w-64 h-64 md:w-80 md:h-80 lg:w-[481px] lg:h-[469px]" alt="Icon Hero">
    </div>
</section>
{{-- About --}}
<section id="about" class="flex flex-col bg-white lg:flex-row justify-center items-center px-4 md:px-10 lg:px-20 min-h-screen dark:bg-gray-900 w-full">
    <div class="mt-6 lg:mt-0 w-full lg:w-1/2 flex justify-center lg:justify-end pr-40">
        <img src="{{asset('/img/icon_about.png')}}" class="w-48 h-48 md:w-64 md:h-64 lg:w-[481px] lg:h-[469px]" alt="Icon About">
    </div>
    <div class="mt-10 lg:mt-0 lg:ml-10 w-full lg:w-1/2 text-center lg:text-left px-4 lg:px-0">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 dark:text-white">Tentang Kami</h1>
        <p class="text-justify mt-4 md:mt-6 lg:mt-8 text-gray-700 dark:text-gray-300">
            Mental Care adalah platform kesehatan mental yang menyediakan fitur meditasi lewat musik, tes kepribadian, video edukasi, dan konsultasi. Melalui layanan ini, pengguna dapat menenangkan pikiran, memahami diri lebih baik, serta mendapatkan edukasi dan dukungan profesional untuk menjaga kesehatan mental.
        </p>
        <div class="flex flex-col sm:flex-row justify-center lg:justify-start items-center gap-4 mt-6 text-gray-700 dark:text-gray-300">
            <div class="flex items-center space-x-2">
                <img src="{{asset('/img/instagram.png')}}" alt="Instagram" class="w-6 h-6">
                <h2>Instagram</h2>
            </div>
            <div class="flex items-center space-x-2">
                <img src="{{asset('/img/wa.png')}}" alt="WhatsApp" class="w-6 h-6">
                <h2>WhatsApp</h2>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4 items-center mt-8 text-lg font-semibold">
            <a href="#konsul" class="w-full sm:w-auto">
                <button class="w-full sm:w-auto border-2 border-blue-600 text-blue-600 px-6 py-2 rounded hover:bg-blue-600 hover:text-white dark:border-white dark:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                    Temukan Psikolog Terbaik
                </button>
            </a>
        </div>
    </div>
</section>

{{-- List psikolog terbaik --}}
<section id="konsul" class="flex justify-center items-center min-h-screen bg-[#756AB6] px-4 md:px-8">
    <div class="py-4 w-full max-w-5xl">
        <div class="text-center mb-6">
            <h1 class="text-2xl sm:text-3xl font-semibold text-white">Psikolog Terbaik</h1>
            <h3 class="text-lg sm:text-xl mt-2 text-white">Pilih sesuai kemauanmu!</h3>
        </div>
        <!-- Grid layout for cards with responsive columns -->
        <div class="grid justify-center grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-black">
            @foreach ($psikologs as $index => $item)
            <!-- Psikolog 1 -->
            <div class="card bg-base-100 rounded shadow-xl dark:text-white bg-gray-100 dark:bg-[#432E54] p-3 sm:p-4">
                <figure class="px-4 pt-4">
                    <img
                        src="{{ Storage::url($item->image) }}"
                        alt="Psikolog Image"
                        class="rounded-xl w-full object-cover" />
                </figure>
                <div class="card-body items-center text-center px-2">
                    <h2 class="card-title text-md sm:text-lg font-bold mt-2">{{ $item->name }}</h2>
                    <p class="text-xs sm:text-sm mt-2">{{ $item->deskripsi }}</p>
                    <div class="card-actions mt-4">
                        @auth
                        <a href="{{url(Auth::user()->role.'/chat')}}" >
                            <button class="border-2 font-bold border-blue-500 px-3 py-1 text-[#756AB6] rounded hover:bg-blue-500 hover:text-white dark:border-gray-300 dark:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                                Booking Konsultasi
                            </button>
                        </a>
                        @else
                        <a href="/chat" data-require-login="true">
                            <button class="border-2 font-bold border-blue-500 px-3 py-1 text-[#756AB6] rounded hover:bg-blue-500 hover:text-white dark:border-gray-300 dark:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                                Booking Konsultasi
                            </button>
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Link to see more -->
        @auth
        <div class="flex justify-center mt-16 text-lg sm:text-xl md:text-2xl dark:text-white text-white">
            <a href="{{url(Auth::user()->role.'/listPsikolog')}}" class="hover:underline">Lihat Psikolog Lainnya →</a>
        </div>
        @else
        <div class="flex justify-center mt-16 text-lg sm:text-xl md:text-2xl dark:text-white text-white">
            <a href="/listPsikolog" class="hover:underline">Lihat Psikolog Lainnya →</a>
        </div>
        @endauth
    </div>
</section>


{{-- User Review --}}
<section id="reviews" class="min-h-screen py-12 px-4 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif
        <!-- Form for Submitting Reviews -->
        @if(Auth::check() && Auth::user()->role == 'user')
            <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white text-center mb-8">
                User Reviews
            </h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Share Your Experience
                </h3>
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf
                    <!-- Rating Section -->
                    <div class="flex items-center mb-6">
                        <label for="rating" class="text-gray-800 dark:text-gray-200 font-medium mr-4">Rating:</label>
                        <div id="rating-group" class="flex space-x-2">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button"
                                    class="rating-btn text-gray-300 hover:text-yellow-500 text-2xl focus:outline-none"
                                    data-value="{{ $i }}">★</button>
                            @endfor
                        </div>
                        <input type="hidden" id="rating" name="rating" value="">
                    </div>
                    <!-- Review Textarea -->
                    <div class="mb-6">
                        <label for="review" class="block text-gray-800 dark:text-gray-200 font-semibold mb-2">Your Review:</label>
                        <textarea id="review" name="review" rows="4"
                            class="w-full p-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white resize-none"
                            placeholder="Write your review here..."></textarea>
                    </div>
                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit"
                            class="bg-blue-600 text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        @endif

        <!-- Reviews List -->
        <div class="mt-12">
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                What Others Are Saying
            </h3>
            <div class="space-y-6">
                @forelse($reviews as $review)
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                        <div class="flex items-center mb-2">
                            <span class="font-bold text-gray-800 dark:text-white">{{ $review->name }}</span>
                            <span
                                class="ml-auto text-sm text-gray-500 dark:text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <!-- Star Rating -->
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
                        No reviews yet. Be the first to share your experience!
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<div id="loadingScreen">
    <div class="loader"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ratingBtns = document.querySelectorAll('.rating-btn');
        const ratingInput = document.getElementById('rating');

        ratingBtns.forEach((btn) => {
            btn.addEventListener('click', function () {
                const value = this.getAttribute('data-value');
                ratingInput.value = value;

                // Highlight stars up to the selected one
                ratingBtns.forEach((star, index) => {
                    star.classList.toggle('text-yellow-500', index < value);
                    star.classList.toggle('text-gray-300', index >= value);
                });
            });
        });
    });
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

    document.addEventListener("DOMContentLoaded", () => {
        const isLoggedIn = false; // Ganti dengan logika untuk memeriksa status login (misalnya, dari session atau API)

        document.querySelectorAll('[data-require-login="true"]').forEach(link => {
            link.addEventListener("click", (event) => {
                if (!isLoggedIn) {
                    event.preventDefault(); // Cegah navigasi default
                    window.location.href = "/login"; // Arahkan ke halaman login
                }
            });
        });
    });
</script>
@endsection
