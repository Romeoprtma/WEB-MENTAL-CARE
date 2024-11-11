@extends('layouts.main')
@section('home')
{{-- Home --}}
<section class="flex flex-col lg:flex-row justify-between items-center bg-[#756AB6] px-4 lg:px-20 h-auto lg:h-[668px] py-10 lg:py-0">
    <!-- Text Section -->
    <div class="title-hero text-center lg:text-left text-[#D4BEE4] font-bold mb-6 lg:mb-0 lg:ml-20">
        <h1 class="text-2xl md:text-3xl lg:text-4xl">MentalCare</h1>
        <h3 class="text-lg md:text-xl lg:text-2xl mt-2">Dukungan Kesehatan Mental yang Terjangkau untuk Semua</h3>
    </div>
    <!-- Image Section -->
    <div class="img-hero flex justify-center lg:justify-end w-full lg:w-auto">
        <img src="img/icon_hero.svg" class="w-64 h-64 md:w-80 md:h-80 lg:w-[481px] lg:h-[469px]" alt="Icon Hero">
    </div>
</section>
{{-- About --}}
<section id="about" class="flex flex-col bg-white lg:flex-row justify-center items-center px-4 md:px-10 lg:px-20 min-h-screen dark:bg-gray-900 w-full">
    <div class="mt-6 lg:mt-0 w-full lg:w-1/2 flex justify-center lg:justify-end pr-40">
        <img src="img/icon_about.png" class="w-48 h-48 md:w-64 md:h-64 lg:w-[481px] lg:h-[469px]" alt="Icon About">
    </div>
    <div class="mt-10 lg:mt-0 lg:ml-10 w-full lg:w-1/2 text-center lg:text-left px-4 lg:px-0">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 dark:text-white">Tentang Kami</h1>
        <p class="text-justify mt-4 md:mt-6 lg:mt-8 text-gray-700 dark:text-gray-300">
            Mental Care adalah platform kesehatan mental yang menyediakan fitur meditasi lewat musik, tes kepribadian, video edukasi, dan konsultasi. Melalui layanan ini, pengguna dapat menenangkan pikiran, memahami diri lebih baik, serta mendapatkan edukasi dan dukungan profesional untuk menjaga kesehatan mental.
        </p>
        <div class="flex flex-col sm:flex-row justify-center lg:justify-start items-center gap-4 mt-6 text-gray-700 dark:text-gray-300">
            <div class="flex items-center space-x-2">
                <img src="img/instagram.png" alt="Instagram" class="w-6 h-6">
                <h2>Instagram</h2>
            </div>
            <div class="flex items-center space-x-2">
                <img src="img/wa.png" alt="WhatsApp" class="w-6 h-6">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-black">
            <!-- Psikolog 1 -->
            <div class="card bg-base-100 rounded shadow-xl dark:text-white bg-gray-100 dark:bg-[#432E54] p-3 sm:p-4">
                <figure class="px-4 pt-4">
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Psikolog Image"
                        class="rounded-xl w-full object-cover" />
                </figure>
                <div class="card-body items-center text-center px-2">
                    <h2 class="card-title text-md sm:text-lg font-bold mt-2">Psikolog 1</h2>
                    <p class="text-xs sm:text-sm mt-2">Jika seorang psikolog bisa membantu, siapa yang akan ia bantu?</p>
                    <div class="card-actions mt-4">
                        <a href="">
                            <button class="border-2 font-bold border-blue-500 px-3 py-1 text-[#756AB6] rounded hover:bg-blue-500 hover:text-white dark:border-gray-300 dark:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                                Booking Konsultasi
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Psikolog 2 -->
            <div class="card bg-base-100 rounded shadow-xl dark:text-white bg-gray-100 dark:bg-[#432E54] p-3 sm:p-4">
                <figure class="px-4 pt-4">
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Psikolog Image"
                        class="rounded-xl w-full object-cover" />
                </figure>
                <div class="card-body items-center text-center px-2">
                    <h2 class="card-title text-md sm:text-lg font-bold mt-2">Psikolog 1</h2>
                    <p class="text-xs sm:text-sm mt-2">Jika seorang psikolog bisa membantu, siapa yang akan ia bantu?</p>
                    <div class="card-actions mt-4">
                        <a href="">
                            <button class="border-2 font-bold border-blue-500 px-3 py-1 text-[#756AB6] rounded hover:bg-blue-500 hover:text-white dark:border-gray-300 dark:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                                Booking Konsultasi
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Psikolog 3 -->
            <div class="card bg-base-100 rounded shadow-xl dark:text-white bg-gray-100 dark:bg-[#432E54] p-3 sm:p-4">
                <figure class="px-4 pt-4">
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Psikolog Image"
                        class="rounded-xl w-full object-cover" />
                </figure>
                <div class="card-body items-center text-center px-2">
                    <h2 class="card-title text-md sm:text-lg font-bold mt-2">Psikolog 1</h2>
                    <p class="text-xs sm:text-sm mt-2">Jika seorang psikolog bisa membantu, siapa yang akan ia bantu?</p>
                    <div class="card-actions mt-4">
                        <a href="">
                            <button class="border-2 font-bold border-blue-500 px-3 py-1 text-[#756AB6] rounded hover:bg-blue-500 hover:text-white dark:border-gray-300 dark:text-white dark:hover:bg-white dark:hover:text-gray-900 transition duration-200">
                                Booking Konsultasi
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Link to see more -->
        <div class="flex justify-center mt-16 text-lg sm:text-xl md:text-2xl dark:text-white text-white">
            <a href="/psikolog" class="hover:underline">Lihat Psikolog Lainnya →</a>
        </div>
    </div>
</section>

{{-- Ripiw --}}
<section class="flex flex-col items-center px-4 py-8 bg-white">
    <!-- Title Section -->
    <h1 class="text-black text-2xl font-bold mb-8">Ripiw</h1>

    <!-- Card Section -->
    <div class="card card-side bg-base-100 shadow-xl max-w-2xl flex flex-row items-center">
        <figure class="w-1/2">
            <img
                src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                alt="Movie"
                class="object-cover h-full w-full rounded-l-lg" />
        </figure>
        <div class="card-body w-1/2 p-6">
            <h2 class="card-title text-lg font-semibold text-gray-800">New Movie is Released!</h2>
            <p class="text-gray-600 mt-2">Click the button to watch on the Jetflix app.</p>
            <!-- Rating Section -->
            <div class="rating mt-4 flex">
                <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-400" />
                <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-400" />
                <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-400" />
                <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-400" />
                <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-400" />
            </div>
        </div>
    </div>
</section>
@endsection
