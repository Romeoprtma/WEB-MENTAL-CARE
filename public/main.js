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
