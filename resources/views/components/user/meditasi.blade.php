@extends('layouts.main')
@section('meditasi')
    {{-- Hero --}}
    <section class="flex justify-center items-center bg-[#756AB6] min-h-screen ">
        <div class="title-hero text-white">
            <h1 class="text-[42px] font-bold">Meditasi</h1>
            <h3 class=" py-2 max-w-[500px] mr-[54px]">Temukan ketenangan batin dengan meditasi berbasis musik.
                Alunan melodi yang menenangkan dirancang untuk membantu meredakan stres,
                meningkatkan fokus, dan memperdalam relaksasi. Mulai perjalanan mental yang lebih
                tenang dan seimbang dengan musik yang membimbing Anda menuju kedamaian.</h3>
        </div>
        <div class="img-hero mr-[80px] mt-10">
            <img src="{{asset('/img/heroMeditasi.png')}}" width="350px" height="350px" alt="">
        </div>
    </section>

    <!-- Playlist Section -->
<section class="flex justify-center items-center bg-white min-h-screen p-4">
    <div class="bg-white text-black p-8 rounded-lg shadow-lg text-center w-full max-w-[100%]">
        <h1 class="text-4xl text-left font-bold mb-6">Music</h1>

        <!-- Playlist Table -->
        <table class="w-full text-left bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-[#756AB6] text-white">
                    <th class="p-4">#</th>
                    <th class="p-4">Song</th>
                    <th class="p-4">Duration</th>
                    <th class="p-4">Play</th>
                </tr>
            </thead>
            <tbody>
                <!-- Song Item 1 -->
                <tr class="text-black hover:bg-gray-100 transition duration-200">
                    <td class="p-4">
                        1
                    </td>
                    <td class="p-4">St. Chroma (feat. Daniel Caesar)</td>
                    <td class="p-4">3:17</td>
                    <td class="p-4">
                        <audio id="audio1" src="audio/musik1.mp3" class="hidden"></audio>
                        <button
                            onclick="togglePlayPause('audio1', 'playPauseIcon1', 'currentTime1', 'progressBar1')"
                            id="playPauseBtn1"
                            class="bg-[#1DB954] hover:bg-[#1ed760] text-white font-semibold py-2 px-4 rounded-full">
                            <span id="playPauseIcon1">
                                <!-- Play Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
                                </svg>
                            </span>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 transition duration-200 ">
                    <td colspan="4" class="p-4">
                        <div class="relative w-full mt-2">
                            <span id="currentTime1" class="absolute left-0 bottom-[-1.5rem] text-sm text-gray-600">0:00</span>
                            <div class="w-full bg-gray-200 h-2 rounded-full">
                                <div id="progressBar1" class="h-2 bg-[#756AB6] rounded-full" style="width: 0%;"></div>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- Song Item 2 -->
                <tr class="text-black hover:bg-gray-100 transition duration-200">
                    <td class="p-4">
                        2
                    </td>
                    <td class="p-4">St. Chroma (feat. Daniel Caesar)</td>
                    <td class="p-4">3:17</td>
                    <td class="p-4">
                        <audio id="audio1" src="audio/musik1.mp3" class="hidden"></audio>
                        <button
                            onclick="togglePlayPause('audio1', 'playPauseIcon1', 'currentTime1', 'progressBar1')"
                            id="playPauseBtn1"
                            class="bg-[#1DB954] hover:bg-[#1ed760] text-white font-semibold py-2 px-4 rounded-full">
                            <span id="playPauseIcon1">
                                <!-- Play Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
                                </svg>
                            </span>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 transition duration-200">
                    <td colspan="4" class="p-4">
                        <div class="relative w-full mt-2">
                            <span id="currentTime1" class="absolute left-0 bottom-[-1.5rem] text-sm text-gray-600">0:00</span>
                            <div class="w-full bg-gray-200 h-2 rounded-full">
                                <div id="progressBar1" class="h-2 bg-[#756AB6] rounded-full" style="width: 0%;"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<div id="loadingScreen">
    <div class="loader"></div>
</div>

<script>
function togglePlayPause(audioId, iconId, currentTimeId, progressBarId) {
    const audio = document.getElementById(audioId);
    const icon = document.getElementById(iconId);

    if (audio.paused) {
        audio.play();
        icon.innerHTML = `
            <!-- Pause Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6" />
            </svg>`;

        // Update current time and progress bar as the audio plays
        audio.addEventListener('timeupdate', () => updateCurrentTime(audio, currentTimeId, progressBarId));
    } else {
        audio.pause();
        icon.innerHTML = `
            <!-- Play Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
            </svg>`;
    }
}

function updateCurrentTime(audio, currentTimeId, progressBarId) {
    const currentTimeElement = document.getElementById(currentTimeId);
    const progressBarElement = document.getElementById(progressBarId);

    const minutes = Math.floor(audio.currentTime / 60);
    const seconds = Math.floor(audio.currentTime % 60).toString().padStart(2, '0');
    currentTimeElement.textContent = `${minutes}:${seconds}`;

    // Update the progress bar width
    const progressPercent = (audio.currentTime / audio.duration) * 100;
    progressBarElement.style.width = `${progressPercent}%`;
}


</script>
@endsection
