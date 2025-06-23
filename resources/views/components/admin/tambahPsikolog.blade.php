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
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Psikolog</label>
                    <input type="text" name="email" id="email" placeholder="Masukkan Email Psikolog" value="{{ old('email') }}" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">No Telpon</label>
                    <input type="number" name="phone" id="phone" placeholder="Masukkan Nomor Telepon" value="{{ old('phone') }}" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Psikolog</label>
                    <textarea name="address" id="address" placeholder="Masukkan Alamat Psikolog" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('address') }}</textarea>
                </div>

                <!-- Pengalaman -->
                <div>
                    <label for="pengalaman" class="block text-sm font-medium text-gray-700">Pengalaman (tahun)</label>
                    <input type="number" name="pengalaman" id="pengalaman" placeholder="Contoh: 5" value="{{ old('pengalaman') }}" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Spesialis -->
                <div>
                    <label for="spesialis" class="block text-sm font-medium text-gray-700">Spesialisasi</label>
                    <input type="text" name="spesialis" id="spesialis" placeholder="Contoh: Trauma Remaja, Kesehatan Mental" value="{{ old('spesialis') }}" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Jadwal Konseling -->
                <div>
                    <label for="jadwal_konseling" class="block text-sm font-medium text-gray-700">Jadwal Konseling</label>
                    <select name="jadwal_konseling" id="jadwal_konseling" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="" hidden selected>-- Pilih Jadwal --</option>
                        <option value="Senin - Jumat, 09:00 - 17:00" {{ old('jadwal_konseling') == 'Senin - Jumat, 09:00 - 17:00' ? 'selected' : '' }}>Senin - Jumat, 09:00 - 17:00</option>
                        <option value="Senin - Kamis, 08:00 - 14:00" {{ old('jadwal_konseling') == 'Senin - Kamis, 08:00 - 14:00' ? 'selected' : '' }}>Senin - Kamis, 08:00 - 14:00</option>
                        <option value="Sabtu - Minggu, 10:00 - 16:00" {{ old('jadwal_konseling') == 'Sabtu - Minggu, 10:00 - 16:00' ? 'selected' : '' }}>Sabtu - Minggu, 10:00 - 16:00</option>
                    </select>
                </div>
                <!-- Gambar -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
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
