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
    <title>Login Admin</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-white dark:bg-[#111827]">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-xl">
    <h2 class="text-2xl font-semibold text-center text-gray-800">Login</h2>
    <form class="mt-6 space-y-4" method="POST" action='/loginAdmin'>
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-1 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="example@gmail.com" required>
        </div>
        <div class="relative">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
              Password
            </label>
            <div class="relative">
              <input type="password" id="password" name="password" class="w-full px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500 pr-10" placeholder="Masukkan Password" required>
              <!-- Button untuk toggle password visibility -->
              <button
                type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-500 focus:outline-none" aria-label="Toggle password visibility">
                <i class="fa-solid fa-eye-slash"></i>
              </button>
            </div>
          </div>
        <div class="flex items-center justify-between">
          <label class="flex items-center">
            <input type="checkbox" class="text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
          </label>
          <a href="#" class="text-sm text-blue-600 hover:underline">Lupa Password?</a>
        </div>
        <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
            Login
        </button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const icon = togglePassword.querySelector('i');

        togglePassword.addEventListener('click', () => {
        // Toggle password visibility
        const isPasswordHidden = passwordInput.type === 'password';
        passwordInput.type = isPasswordHidden ? 'text' : 'password';

        // Toggle icon class
        icon.classList.toggle('fa-eye-slash', !isPasswordHidden);
        icon.classList.toggle('fa-eye', isPasswordHidden);
        });

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
                customClass: {
                    confirmButton: 'btn-confirm'
                }
            });
        @endif
    </script>
</body>
</html>
