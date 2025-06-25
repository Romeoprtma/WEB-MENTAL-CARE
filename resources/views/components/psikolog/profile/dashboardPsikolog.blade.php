@extends('layouts.mainPsikolog')

@section('dashboardPsikolog')
<section class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <section class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div id="dashboard-section" class="content-section">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Profile Saya</h1>
                <p class="text-gray-600">Selamat datang kembali, {{ Auth::user()->name }}</p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Total Pasien --}}
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6 flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Pasien</p>
                            <p class="text-2xl font-semibold text-gray-900">127</p>
                        </div>
                    </div>
                </div>
                {{-- Sesi Hari Ini --}}
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6 flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Sesi Hari Ini</p>
                            <p class="text-2xl font-semibold text-gray-900">8</p>
                        </div>
                    </div>
                </div>
                {{-- Meditasi Aktif --}}
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6 flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Meditasi Aktif</p>
                            <p class="text-2xl font-semibold text-gray-900">15</p>
                        </div>
                    </div>
                </div>
                {{-- Tes Diselesaikan --}}
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6 flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Tes Diselesaikan</p>
                            <p class="text-2xl font-semibold text-gray-900">43</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Profil Psikolog Section --}}
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                    <div class="flex justify-between items-start mb-8">
                        {{-- Informasi Psikolog --}}
                        <div class="flex items-center space-x-6">
                            <img
                                class="w-24 h-24 rounded-full object-cover"
                                src="{{ $user->image
                                        ? asset('storage/' . $user->image)
                                        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=6366f1&color=fff&size=256' }}"
                                alt="Foto Psikolog">

                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ optional($user->psikolog)->spesialis ?? 'Spesialisasi tidak tersedia' }}
                                </p>

                                <div class="mt-3 space-y-1 text-sm text-gray-700">
                                    <p>
                                        <strong>Pengalaman:</strong>
                                        {{ optional($user->psikolog)->pengalaman ?? '-' }} tahun
                                    </p>
                                    <p>
                                        <strong>Jadwal Konseling:</strong>
                                        {{ optional($user->psikolog)->jadwal_konseling ?? '-' }}
                                    </p>
                                    <p>
                                        <strong>Email:</strong> {{ $user->email }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Edit --}}
                        <form action="{{ route('home.edit', $user->id) }}" method="GET">
                            <button
                                class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.232 5.232l3.536 3.536M9 13l6.732-6.732a2 2 0 012.828 0l.172.172a2 2 0 010 2.828L12 17H9v-3z"
                                    />
                                </svg>
                                Edit Profil
                            </button>
                        </form>
                    </div>
            </div>
        </div>
    </section>
</section>

<style>
.nav-link {
    @apply flex items-center px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-md transition-colors duration-200;
}
.nav-link.active {
    @apply text-indigo-600 bg-indigo-50;
}
.content-section {
    @apply transition-all duration-300 ease-in-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const contentSections = document.querySelectorAll('.content-section');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            navLinks.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
            contentSections.forEach(section => section.classList.add('hidden'));
            const targetSection = this.getAttribute('data-section') + '-section';
            const targetElement = document.getElementById(targetSection);
            if (targetElement) targetElement.classList.remove('hidden');
        });
    });
});
</script>
@endsection
