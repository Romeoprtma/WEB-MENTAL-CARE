function togglePlayPause(audioId, iconId) {
    const audio = document.getElementById(audioId);
    const icon = document.getElementById(iconId);

    if (audio.paused) {
        audio.play();
        icon.innerHTML = `
            <!-- Pause Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6" />
            </svg>`;
    } else {
        audio.pause();
        icon.innerHTML = `
            <!-- Play Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.5-3.75A1 1 0 007 8.25v7.5a1 1 0 001.252.928l6.5-3.75a1 1 0 000-1.856z" />
            </svg>`;
    }
}
