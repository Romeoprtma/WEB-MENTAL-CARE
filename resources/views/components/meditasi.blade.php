@extends('layouts.main')
@section('meditasi')
    {{-- Hero --}}
    <section class="flex justify-center items-center bg-[#756AB6] ">
        <div class="title-hero text-white">
            <h1 class="text-[42px] font-bold">Meditasi</h1>
            <h3 class=" py-2 max-w-[500px] mr-[54px]">Temukan ketenangan batin dengan meditasi berbasis musik.
                Alunan melodi yang menenangkan dirancang untuk membantu meredakan stres,
                meningkatkan fokus, dan memperdalam relaksasi. Mulai perjalanan mental yang lebih
                tenang dan seimbang dengan musik yang membimbing Anda menuju kedamaian.</h3>
        </div>
        <div class="img-hero mr-[80px] mt-10">
            <img src="img/heroMeditasi.png" width="350px" height="350px" alt="">
        </div>
    </section>

    <!-- Playlist Section -->
<section class="flex justify-center items-center bg-white min-h-screen p-4">
    <div class="bg-[#756AB6] text-white p-8 rounded-lg shadow-lg text-center w-full max-w-[1200px]">
        <h1 class="text-2xl font-bold mb-6">My Playlist</h1>

        <!-- Playlist Table -->
        <table class="w-full text-left bg-[#282828] rounded-lg shadow-md">
            <thead>
                <tr class="text-gray-400">
                    <th class="p-4">Album Cover</th>
                    <th class="p-4">Song</th>
                    <th class="p-4">Artist</th>
                    <th class="p-4">Plays</th>
                    <th class="p-4">Duration</th>
                    <th class="p-4">Play</th>
                </tr>
            </thead>
            <tbody>
                <!-- Song Item 1 -->
                <tr class="text-white hover:bg-gray-700 transition duration-200">
                    <td class="p-4">
                        <img src="img/albumCover1.png" alt="Album Cover" class="w-20 h-20 rounded-md">
                    </td>
                    <td class="p-4">St. Chroma (feat. Daniel Caesar)</td>
                    <td class="p-4">Tyler, The Creator, Daniel Caesar</td>
                    <td class="p-4">13,809,200</td>
                    <td class="p-4">3:17</td>
                    <td class="p-4">
                        <audio id="audio1" src="audio/musik1.mp3" class="hidden"></audio>
                        <button onclick="togglePlayPause('audio1', 'playPauseIcon1')" id="playPauseBtn1" class="bg-[#1DB954] hover:bg-[#1ed760] text-white font-semibold py-2 px-4 rounded-full">
                            <span id="playPauseIcon1">
                                <!-- Play Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
                                </svg>
                            </span>
                        </button>
                    </td>
                </tr>

                <!-- Song Item 2 -->
                <tr class="text-white hover:bg-gray-700 transition duration-200">
                    <td class="p-4">
                        <img src="img/albumCover2.png" alt="Album Cover" class="w-20 h-20 rounded-md">
                    </td>
                    <td class="p-4">The Weekend - Blinding Lights</td>
                    <td class="p-4">The Weekend</td>
                    <td class="p-4">21,230,300</td>
                    <td class="p-4">3:20</td>
                    <td class="p-4">
                        <audio id="audio2" src="audio/musik2.mp3" class="hidden"></audio>
                        <button onclick="togglePlayPause('audio2', 'playPauseIcon2')" id="playPauseBtn2" class="bg-[#1DB954] hover:bg-[#1ed760] text-white font-semibold py-2 px-4 rounded-full">
                            <span id="playPauseIcon2">
                                <!-- Play Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
                                </svg>
                            </span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection
