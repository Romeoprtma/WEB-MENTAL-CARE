@extends('layouts.main')
@section('meditasi')
{{-- Hero --}}
<section class="flex justify-center items-center bg-[#756AB6] min-h-screen ">
    <div class="title-hero text-white">
        <h1 class="text-[42px] font-bold">Meditasi</h1>
        <h3 class="py-2 max-w-[500px] mr-[54px]">Temukan ketenangan batin dengan meditasi berbasis musik.
            Alunan melodi yang menenangkan dirancang untuk membantu meredakan stres,
            meningkatkan fokus, dan memperdalam relaksasi. Mulai perjalanan mental yang lebih
            tenang dan seimbang dengan musik yang membimbing Anda menuju kedamaian.</h3>
    </div>
    <div class="img-hero mr-[80px] mt-10">
        <img src="{{asset('/img/heroMeditasi.png')}}" width="350px" height="350px" alt="">
    </div>
</section>

{{-- Playlist Section --}}
<section class="bg-white min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Music</h1>

        {{-- Playlist Container --}}
        <div class="space-y-2">
            @forelse ($songs as $index => $item)
                @if ($item->is_approved)
                    {{-- Horizontal Music Row --}}
                    <div class="music-row group bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm transition-all duration-300 hover:shadow-md hover:bg-gray-100">
                        
                        {{-- Top Row: Info and Play Button --}}
                        <div class="flex items-center space-x-4">
                            {{-- Track Number --}}
                            <span class="text-base font-medium text-gray-500">{{ $index + 1 }}</span>

                            {{-- Play/Pause Button --}}
                            <button
                                onclick="togglePlayPause('audio{{ $index }}', 'playPauseIcon{{ $index }}', 'currentTime{{ $index }}', 'progressBar{{ $index }}')"
                                class="bg-[#756AB6] hover:bg-[#5E5490] text-white w-10 h-10 flex items-center justify-center rounded-full transition-transform transform hover:scale-105 flex-shrink-0">
                                <span id="playPauseIcon{{ $index }}">
                                    {{-- Play Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                                    </svg>
                                </span>
                            </button>

                            {{-- Song Title and Description --}}
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->title }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item->description }}</p>
                            </div>
                            
                            {{-- Total Duration --}}
                            <span class="text-base font-medium text-gray-500 hidden sm:block">{{ $item->formatted_duration }}</span>
                        </div>

                        {{-- Bottom Row: Progress Bar --}}
                        <div class="w-full mt-3">
                             <div class="bg-gray-200 h-1.5 rounded-full">
                                <div id="progressBar{{ $index }}" class="h-1.5 bg-[#756AB6] rounded-full" style="width: 0%;"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-400 mt-1">
                                <span id="currentTime{{ $index }}">0:00</span>
                                <span class="block sm:hidden">{{ $item->formatted_duration }}</span> {{-- Show duration here on small screens --}}
                            </div>
                        </div>

                        {{-- Hidden Audio Element --}}
                        <audio id="audio{{ $index }}" src="{{ asset('storage/' . $item->audio_file) }}" preload="metadata"></audio>
                    </div>
                @endif
            @empty
                <div class="text-center py-10 px-6 bg-gray-50 rounded-lg">
                    <p class="text-gray-500">Saat ini belum ada musik yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<script>
// Variabel untuk melacak audio yang sedang diputar
let currentlyPlaying = null;
let currentIcon = null;

function togglePlayPause(audioId, iconId, currentTimeId, progressBarId) {
    const audio = document.getElementById(audioId);
    const icon = document.getElementById(iconId);

    // Jika ada lagu lain yang sedang diputar, hentikan lagu itu terlebih dahulu
    if (currentlyPlaying && currentlyPlaying !== audio) {
        currentlyPlaying.pause();
        currentIcon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
            </svg>`;
    }

    if (audio.paused) {
        audio.play();
        icon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6" />
            </svg>`;
        
        // Simpan audio dan ikon yang sedang aktif
        currentlyPlaying = audio;
        currentIcon = icon;

        // Update progress bar dan waktu saat audio dimainkan
        audio.addEventListener('timeupdate', () => updateProgress(audio, currentTimeId, progressBarId));

        // Reset saat lagu selesai
        audio.onended = () => {
            icon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
                </svg>`;
            updateProgress(audio, currentTimeId, progressBarId); // Reset progress bar
            currentlyPlaying = null;
            currentIcon = null;
        };

    } else {
        audio.pause();
        icon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
            </svg>`;
        
        currentlyPlaying = null;
        currentIcon = null;
    }
}

function updateProgress(audio, currentTimeId, progressBarId) {
    const currentTimeElement = document.getElementById(currentTimeId);
    const progressBarElement = document.getElementById(progressBarId);

    // Hanya update jika elemen ada
    if (currentTimeElement && progressBarElement) {
        const minutes = Math.floor(audio.currentTime / 60);
        const seconds = Math.floor(audio.currentTime % 60).toString().padStart(2, '0');
        
        // PERBAIKAN: Menggunakan backtick (`) untuk template literal
        currentTimeElement.textContent = `${minutes}:${seconds}`;

        const progressPercent = audio.duration ? (audio.currentTime / audio.duration) * 100 : 0;
        
        // PERBAIKAN: Menggunakan backtick (`) untuk template literal
        progressBarElement.style.width = `${progressPercent}%`;
    }
}
</script>
@endsection
