@extends('layouts.mainPsikolog')
@section('editProfilePsikolog')
<form action="{{ route('home.update',   Auth::id()) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md">
    @csrf
    @method('PUT')
    <div class="flex flex-col items-center justify-center mb-6">
        <label for="image" class="block mb-1 text-center">Foto Profil</label>
        <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 hover:file:bg-gray-200" accept="image/*" onchange="previewImage(event)">
        <div class="mt-2 flex justify-center">
            <img id="image-preview" src="{{ $profile->image ? asset('storage/' . $profile->image) : '' }}" alt="Preview Foto Profil" class="max-h-40 rounded" @if(!$profile->image) style="display:none;" @endif>
        </div>
    </div>
    <div>
        <label for="name" class="block mb-1">Nama Lengkap</label>
        <input type="text" name="name" id="name" class="border rounded w-full p-2" value="{{ old('name', $profile->user->name ?? '') }}" required>
    </div>
    <div>
        <label for="address" class="block mb-1">Alamat</label>
        <textarea name="address" id="address" class="border rounded w-full p-2" required>{{ old('address', $profile->user->address ?? '') }}</textarea>
    </div>
    <div>
        <label for="phone" class="block mb-1">No. Telepon</label>
        <input name="phone" id="phone" value="{{ old('phone', $profile->user->phone ?? '') }}" class="border rounded w-full p-2" required>
    </div>
    <div>
        <label for="email" class="block mb-1">Email</label>
        <input type="email" name="email" id="email" class="border rounded w-full p-2" value="{{ old('email', $profile->user->email ?? '') }}" required>
    </div>

    <div class="mt-4">
        <label for="pengalaman" class="block mb-1">Pengalaman</label>
        <input type="text" name="pengalaman" id="pengalaman" class="border rounded w-full p-2" value="{{ old('pengalaman', $profile->pengalaman ?? '') }}" required>
    </div>

    <div>
        <label for="jadwal_konseling" class="block text-sm font-medium text-gray-700">Jadwal Konseling</label>
        <select name="jadwal_konseling" id="jadwal_konseling" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="" hidden selected>Pilih Jadwal</option>
            <option value="Senin - Jumat, 09:00 - 17:00" {{ old('jadwal_konseling', $profile->jadwal_konseling ?? '') == 'Senin - Jumat, 09:00 - 17:00' ? 'selected' : '' }}>Senin - Jumat, 09:00 - 17:00</option>
            <option value="Senin - Kamis, 08:00 - 14:00" {{ old('jadwal_konseling', $profile->jadwal_konseling ?? '') == 'Senin - Kamis, 08:00 - 14:00' ? 'selected' : '' }}>Senin - Kamis, 08:00 - 14:00</option>
            <option value="Sabtu - Minggu, 10:00 - 16:00" {{ old('jadwal_konseling', $profile->jadwal_konseling ?? '') == 'Sabtu - Minggu, 10:00 - 16:00' ? 'selected' : '' }}>Sabtu - Minggu, 10:00 - 16:00</option>
        </select>
    </div>
    {{-- Password --}}
    {{-- <div class="relative">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <div class="relative">
            <input type="password" id="password" name="password" class="w-full px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500 pr-12" placeholder="Masukkan password">
                <!-- Ikon toggle password -->
            <button type="button" id="togglePassword" class="absolute inset-y-0 right-2 flex items-center text-gray-500 focus:outline-none" aria-label="Toggle password visibility">
                <i class="fa-solid fa-eye-slash"></i>
            </button>
        </div>
    </div>
    <div class="relative">
        <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
        <div class="relative">
            <input type="password" id="confirmPassword" name="password_confirmation" class="w-full px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500 pr-12" placeholder="Konfirmasi password">
            <!-- Ikon toggle konfirmasi password -->
            <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-2 flex items-center text-gray-500 focus:outline-none" aria-label="Toggle confirm password visibility">
                <i class="fa-solid fa-eye-slash"></i>
            </button>
        </div>
    </div> --}}
    <div class="mt-4">
        <label for="spesialis" class="block mb-1">Spesialis</label>
        <input type="text" name="spesialis" id="spesialis" class="border rounded w-full p-2" value="{{ old('spesialis', $profile->spesialis ?? '') }}" required>
    </div>
    <div class="mt-6">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </div>
</form>

<script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

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
