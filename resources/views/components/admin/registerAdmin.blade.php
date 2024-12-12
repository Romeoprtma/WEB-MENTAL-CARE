<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register Admin</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-white dark:bg-[#111827]">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-xl">
        <h2 class="text-2xl font-semibold text-center text-gray-800">Daftar Akun</h2>
        <form class="mt-6 space-y-4" method="POST" action="/registerAdmin">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 mt-1 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Nama Lengkap" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-1 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="example@gmail.com" required>
            </div>
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500 pr-12" placeholder="Masukkan password" required>
                    <!-- Ikon toggle password -->
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-2 flex items-center text-gray-500 focus:outline-none" aria-label="Toggle password visibility">
                        <i class="fa-solid fa-eye-slash"></i>
                    </button>
                </div>
            </div>
            <div class="relative">
                <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <div class="relative">
                    <input type="password" id="confirmPassword" name="password_confirmation" class="w-full px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500 pr-12" placeholder="Konfirmasi password" required>
                    <!-- Ikon toggle konfirmasi password -->
                    <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-2 flex items-center text-gray-500 focus:outline-none" aria-label="Toggle confirm password visibility">
                        <i class="fa-solid fa-eye-slash"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Daftar Akun
            </button>
        </form>

        <p id="passwordError" class="mt-1 text-sm text-red-600 hidden font-bold">*Password dan konfirmasi password tidak sesuai.</p>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </div>

    <script>
        // Toggle visibility password
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordError = document.getElementById('passwordError');
        const submitButton = document.querySelector('button[type="submit"]');
        const form = document.querySelector('form');
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

        // Konfirmasi Password
        function validatePasswords() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (password !== confirmPassword) {
                passwordError.classList.remove('hidden');
            } else {
                passwordError.classList.add('hidden');
            }
        }

        passwordInput.addEventListener('input', validatePasswords);
        confirmPasswordInput.addEventListener('input', validatePasswords);

         // Validasi saat submit
        form.addEventListener('submit', function (event) {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        // Cek apakah password dan konfirmasi password cocok
            if (password !== confirmPassword) {
                event.preventDefault(); // Mencegah form dikirim jika password tidak cocok
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Password anda tidak sesuai!",
                    customClass: {
                        confirmButton: 'btn-confirm'
                    }
                });
            }
        });

        const iconPassword = togglePassword.querySelector('i');
        const iconConfirmPassword = toggleConfirmPassword.querySelector('i');

        togglePassword.addEventListener('click', () => {
            const isPasswordHidden = passwordInput.type === 'password';
            passwordInput.type = isPasswordHidden ? 'text' : 'password';
            iconPassword.classList.toggle('fa-eye-slash', !isPasswordHidden);
            iconPassword.classList.toggle('fa-eye', isPasswordHidden);
        });

        toggleConfirmPassword.addEventListener('click', () => {
            const isConfirmPasswordHidden = confirmPasswordInput.type === 'password';
            confirmPasswordInput.type = isConfirmPasswordHidden ? 'text' : 'password';
            iconConfirmPassword.classList.toggle('fa-eye-slash', !isConfirmPasswordHidden);
            iconConfirmPassword.classList.toggle('fa-eye', isConfirmPasswordHidden);
        });

        @if(session('success'))
            Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            customClass: {
                confirmButton: 'btn-confirm'
            }
        });
        @endif
    </script>
</body>
</html>
