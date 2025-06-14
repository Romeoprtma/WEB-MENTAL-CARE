@extends('layouts.mainAdmin')
@section('tambahPsikolog')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <div class="bg-white p-4">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">FORM TAMBAH PSIKOLOG</h1>
            <form action="{{ route('kelolaPsikolog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Input Nama Psikolog -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Psikolog</label>
                    <input type="text" name="name" id="name" placeholder="Masukkan Nama Psikolog" value="{{ old('name') }}" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    {{-- @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror --}}
                </div>
                {{-- email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Psikolog</label>
                    <input type="text" name="email" id="email" placeholder="Masukkan Nama Psikolog" value="{{ old('email') }}" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    {{-- @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror --}}
                </div>
                {{-- phone --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">No Telpon</label>
                    <input type="number" name="phone" id="phone" placeholder="Masukkan Nama Psikolog" value="{{ old('phone') }}" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    {{-- @error('phone')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror --}}
                </div>
                {{-- alamat --}}
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Psikolog</label>
                    <textarea type="text" name="address" id="address" placeholder="Masukkan Nama Psikolog" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('address') }}</textarea>
                    {{-- @error('address')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror --}}
                </div>
                <!-- Input password -->
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
                {{-- input comfirm password --}}
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

                <!-- Input Gambar -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    {{-- @error('image')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror --}}
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-center">
                    <button type="submit" class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-[#756AB6] hover:bg-[#756AAA] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center text-lg font-semibold">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
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
    </script>
@endsection
