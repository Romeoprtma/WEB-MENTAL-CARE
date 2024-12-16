// Tampilkan loader saat halaman dimuat
window.addEventListener('load', function () {
    showLoader();
    setTimeout(() => {
        hideLoader();
    }, 4000);
});

// Tampilkan loader
function showLoader() {
const loadingScreen = document.getElementById("loadingScreen");
const hideBody=document.getElementById("hideBody");
hideBody.style.visibility="hidden";
loadingScreen.style.visibility = "visible"; // Mengubah visibility menjadi terlihat
loadingScreen.style.display = "flex"; // Pastikan loader ditampilkan (gunakan flex agar loader berada di tengah)
}

function hideLoader() {
    const loadingScreen = document.getElementById("loadingScreen");
    const hideBody=document.getElementById("hideBody");
    hideBody.style.visibility="visible";
    loadingScreen.style.visibility = "hidden";
    loadingScreen.style.display = "none";
}
