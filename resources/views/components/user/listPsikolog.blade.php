@extends('layouts.main')
@section('listPsikolog')

<!-- Section Psikolog -->
<section class="bg-[#756AB6] py-8 h-screen">
    <!-- Judul -->
    <div class="flex justify-center p-6">
        <h1 class="text-2xl text-white font-bold">List Psikolog</h1>
    </div>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Card 1 -->
        <a href="#" class="block" onclick="openDetail('Dr. Romeo Sp.KJ', 'Lorem ipsum dolor sit amet consectetur', 'Romeo specializes in adolescent mental health with expertise in behavioral therapy.', 'https://via.placeholder.com/150')">
            <div class="bg-purple-500 text-white p-4 rounded-lg shadow-md flex items-center space-x-4
                        transition-colors duration-300 hover:bg-purple-600">
                <!-- Avatar -->
                <img
                  class="w-16 h-16 rounded-full"
                  src="https://via.placeholder.com/150"
                  alt="Doctor"
                />
                <!-- Content -->
                <div class="flex-1">
                    <!-- Header -->
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Dr. Romeo Sp.KJ</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-green-400">● Online</span>
                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <p class="text-sm mt-1">Lorem ipsum dolor sit amet consectetur</p>
                    <!-- Actions -->
                    <div class="mt-3 flex items-center space-x-2">
                        <!-- Tombol Chat yang Mengarah ke Halaman Chat -->
                        <a href="/psikolog/chat" class="bg-purple-700 hover:bg-purple-600 text-white text-xs px-3 py-1 rounded-full transition duration-300">
                            Chat dengan Psikolog
                        </a>
                        <!-- Rating -->
                        <div class="flex items-center space-x-1">
                            <!-- Stars -->
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.91c.969 0 1.371 1.24.588 1.81l-3.97 2.884a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.884a1 1 0 00-1.175 0l-3.97 2.884c-.783.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.365-1.118l-3.97-2.884c-.783-.57-.38-1.81.588-1.81h4.91a1 1 0 00.951-.69l1.518-4.674z" />
                            </svg>
                            <!-- Rating -->
                            <h2>5.0</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <!-- Duplikasi Card Lain -->
    </div>
</section>
<div id="loadingScreen">
    <div class="loader"></div>
</div>

<!-- detail Overlay -->
<div id="detail" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white dark:bg-[#1A202C] rounded-lg shadow-lg max-w-sm w-full p-6 relative">
        <!-- Close Button -->
        <button
            class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 dark:text-gray-300"
            onclick="closeDetail()">
            ✖
        </button>

        <!-- detail Content -->
        <div class="text-center">
            <!-- Foto Psikolog -->
            <img id="detailImage" src="" alt="Foto Psikolog" class="w-24 h-24 rounded-full mx-auto mb-4">
            <!-- Nama Psikolog -->
            <h3 id="detailTitle" class="text-lg font-semibold text-gray-800 dark:text-white"></h3>
            <!-- Deskripsi Psikolog -->
            <p id="detailDescription" class="text-gray-600 dark:text-gray-400 mt-2"></p>
            <!-- Detail Psikolog -->
            <p id="detailDetail" class="text-gray-500 dark:text-gray-300 mt-4 text-sm"></p>
        </div>

        <!-- Action Button -->
        <div class="mt-6 text-center">
            <button
                class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition">
                Hubungi Sekarang
            </button>
        </div>
    </div>
</div>

<script>

    function openDetail(title, description, detail, image) {
        // Set isi detail
        document.getElementById('detailTitle').innerText = title;
        document.getElementById('detailDescription').innerText = description;
        document.getElementById('detailDetail').innerText = detail;
        document.getElementById('detailImage').src = image;

        // Tampilkan detail
        document.getElementById('detail').classList.remove('hidden');
    }

    // Fungsi untuk menutup detail
    function closeDetail() {
        document.getElementById('detail').classList.add('hidden');
    }
</script>
@endsection
