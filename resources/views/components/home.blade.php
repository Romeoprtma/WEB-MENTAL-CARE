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

{{-- User Review --}}
<section id="reviews" class="min-h-screen py-8 px-4 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold text-gray-800 dark:text-white text-center mb-6">
        User Reviews
      </h2>
      <!-- Review Form -->
      <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <form method="POST">
          <!-- Star Rating -->
          <div class="flex items-center mb-4">
            <label class="text-gray-800 dark:text-gray-200 font-semibold mr-4">Rating:</label>
            <div class="flex space-x-2">
                {{-- Bintang --}}
              <button type="button" class="rating-star">
                <svg class="w-6 h-6 text-gray-400 hover:text-yellow-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.91c.969 0 1.371 1.24.588 1.81l-3.97 2.884a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.884a1 1 0 00-1.175 0l-3.97 2.884c-.783.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.365-1.118l-3.97-2.884c-.783-.57-.38-1.81.588-1.81h4.91a1 1 0 00.951-.69l1.518-4.674z" />
                </svg>
              </button>
              <button type="button" class="rating-star">
                <svg class="w-6 h-6 text-gray-400 hover:text-yellow-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.91c.969 0 1.371 1.24.588 1.81l-3.97 2.884a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.884a1 1 0 00-1.175 0l-3.97 2.884c-.783.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.365-1.118l-3.97-2.884c-.783-.57-.38-1.81.588-1.81h4.91a1 1 0 00.951-.69l1.518-4.674z" />
                </svg>
              </button>
              <button type="button" class="rating-star">
                <svg class="w-6 h-6 text-gray-400 hover:text-yellow-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.91c.969 0 1.371 1.24.588 1.81l-3.97 2.884a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.884a1 1 0 00-1.175 0l-3.97 2.884c-.783.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.365-1.118l-3.97-2.884c-.783-.57-.38-1.81.588-1.81h4.91a1 1 0 00.951-.69l1.518-4.674z" />
                </svg>
              </button>
              <button type="button" class="rating-star">
                <svg class="w-6 h-6 text-gray-400 hover:text-yellow-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.91c.969 0 1.371 1.24.588 1.81l-3.97 2.884a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.884a1 1 0 00-1.175 0l-3.97 2.884c-.783.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.365-1.118l-3.97-2.884c-.783-.57-.38-1.81.588-1.81h4.91a1 1 0 00.951-.69l1.518-4.674z" />
                </svg>
              </button>
              <button type="button" class="rating-star">
                <svg class="w-6 h-6 text-gray-400 hover:text-yellow-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.91c.969 0 1.371 1.24.588 1.81l-3.97 2.884a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.884a1 1 0 00-1.175 0l-3.97 2.884c-.783.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.365-1.118l-3.97-2.884c-.783-.57-.38-1.81.588-1.81h4.91a1 1 0 00.951-.69l1.518-4.674z" />
                </svg>
              </button>
            </div>
          </div>
          <!-- Review Text -->
          <div class="mb-4">
            <label for="review" class="block text-gray-800 dark:text-gray-200 font-semibold mb-2">Your Review:</label>
            <textarea id="review" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"></textarea>
        </div>
        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Submit
            </button>
        </div>
        </form>
    </div>
    <!-- Reviews List -->
    <div class="mt-8">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Recent Reviews</h3>
        <div class="space-y-4">
        <!-- Example Review -->
        <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <div class="flex items-center mb-2">
              <div class="flex space-x-1 text-yellow-500">
                <!-- Example filled stars -->
                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.91c.969 0 1.371 1.24.588 1.81l-3.97 2.884a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.884a1 1 0 00-1.175 0l-3.97 2.884c-.783.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.365-1.118l-3.97-2.884c-.783-.57-.38-1.81.588-1.81h4.91a1 1 0 00.951-.69l1.518-4.674z" />
                </svg>
            </div>
            <span class="ml-2 text-gray-700 dark:text-gray-300">John Doe</span>
            </div>
            <p class="text-gray-600 dark:text-gray-400">Great app, very helpful for mental health support!</p>
        </div>
        <!-- Repeat for other reviews -->
        </div>
    </div>
    </div>
</section>
@endsection
