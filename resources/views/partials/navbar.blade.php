<nav class="bg-white border-gray-200 shadow-lg dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        @auth
        <a href="{{url(Auth::user()->role.'/home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Mental Care</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{url(Auth::user()->role.'/home')}}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                </li>

                <li>
                    <a href="{{url(Auth::user()->role.'/home#about')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tentang Kami</a>
                </li>
                <li>
                    <a href="{{url(Auth::user()->role.'/meditasi')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Meditasi</a>
                </li>
                <li>
                    <a href="{{url(Auth::user()->role.'/tesKepribadian')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tes Kepribadian</a>
                </li>
                <li>
                    <div class="relative inline-block text-left">
                        <div>
                          <button
                            type="button" class="inline-flex py-2 px-2 text-white hover:text-gray-700  justify-center rounded-full shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                            <svg
                              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6 dark:fill-current" aria-hidden="true">
                              <path
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"
                              />
                            </svg>
                          </button>
                        </div>
                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                          <div class="py-1" role="none">
                            <a href="{{url(Auth::user()->role.'/profile')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">
                                Profile Saya
                            </a>
                          </div>
                          @if(session('logout'))
                                <div class="bg-blue-500 text-white p-4 rounded-lg mb-6 text-center">
                                    {{ session('logout') }}
                                </div>
                            @endif
                          <div class="py-1" role="none">
                            <form method="POST" action="/logout">
                                @csrf
                              <button
                                type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-3">
                                Keluar
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>
                </li>
            </ul>
        </div>
        @else
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Mental Care</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div id="navbar-default" class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#about" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tentang Kami</a>
                </li>
                <li>
                    <a href="/meditasi" data-require-login="true" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Meditasi</a>
                </li>
                <li>
                    <a href="/tesKepribadian" data-require-login="true" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tes Kepribadian</a>
                </li>
                <li>
                    <a href="/login" class="block py-2 px-3 border border-gray-700 rounded text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white dark:border-gray-600 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Masuk</a>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   document.addEventListener('DOMContentLoaded', () => {
  const menuButton = document.getElementById('menu-button');
  const dropdownMenu = document.querySelector('.relative .absolute');

  // Toggle the dropdown menu
  menuButton.addEventListener('click', () => {
    const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
    menuButton.setAttribute('aria-expanded', !isExpanded);
    dropdownMenu.classList.toggle('hidden');
  });

  // Close the dropdown menu if clicked outside
  document.addEventListener('click', (event) => {
    if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
      menuButton.setAttribute('aria-expanded', 'false');
      dropdownMenu.classList.add('hidden');
    }
  });
});

// Ambil tombol dan elemen navbar
const toggleButton = document.querySelector('[data-collapse-toggle="navbar-default"]');
const navbar = document.getElementById('navbar-default');

// Tambahkan event listener ke tombol
toggleButton.addEventListener('click', () => {
  // Toggle kelas "hidden" untuk menampilkan atau menyembunyikan navbar
  navbar.classList.toggle('hidden');

  // Perbarui atribut aria-expanded sesuai dengan status navbar
  const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
  toggleButton.setAttribute('aria-expanded', !isExpanded);
});

document.addEventListener("DOMContentLoaded", () => {
    const isLoggedIn = false; // Ganti dengan logika untuk memeriksa status login (misalnya, dari session atau API)

    document.querySelectorAll('[data-require-login="true"]').forEach(link => {
        link.addEventListener("click", (event) => {
            if (!isLoggedIn) {
                event.preventDefault(); // Cegah navigasi default
                window.location.href = "/login"; // Arahkan ke halaman login
            }
        });
    });
});

@if (session('logout'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil Keluar!',
        text: '{{ session('logout') }}',
        customClass: {
            confirmButton: 'btn-confirm'
        }
    });
@endif
</script>
