@extends('layouts.mainAdmin')

@section('kelolaPsikolog')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <div class="bg-white p-4">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">EDIT PSIKOLOG</h1>
            <!-- Form Edit -->
            <form action="{{ route('kelolaPsikolog.update', $psikolog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Mengganti metode menjadi PUT -->
                <!-- Input Nama Psikolog -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Psikolog</label>
                    <input type="text" name="name" id="name" placeholder="Masukkan Nama Psikolog" value="{{ old('name', $psikolog->name) }}" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                {{-- email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Psikolog</label>
                    <input type="text" name="email" id="email" placeholder="Masukkan Nama Psikolog" value="{{ old('email', $psikolog->email) }}" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                {{-- phone --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">No Telpon</label>
                    <input type="number" name="phone" id="phone" placeholder="Masukkan Nama Psikolog" value="{{ old('phone', $psikolog->phone) }}" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('phone')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                {{-- alamat --}}
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Psikolog</label>
                    <textarea type="text" name="address" id="address" placeholder="Masukkan Nama Psikolog" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('address', $psikolog->address) }}</textarea>
                    @error('address')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
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
                        <option value="">-- Pilih Jadwal --</option>
                        <option value="Senin - Jumat, 09:00 - 17:00" {{ old('jadwal_konseling') == 'Senin - Jumat, 09:00 - 17:00' ? 'selected' : '' }}>Senin - Jumat, 09:00 - 17:00</option>
                        <option value="Senin - Kamis, 08:00 - 14:00" {{ old('jadwal_konseling') == 'Senin - Kamis, 08:00 - 14:00' ? 'selected' : '' }}>Senin - Kamis, 08:00 - 14:00</option>
                        <option value="Sabtu - Minggu, 10:00 - 16:00" {{ old('jadwal_konseling') == 'Sabtu - Minggu, 10:00 - 16:00' ? 'selected' : '' }}>Sabtu - Minggu, 10:00 - 16:00</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Gambar</label>
                    <input type="file" name="image" id="image"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#756AB6]">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    @if ($psikolog->image)
                        <img src="{{ Storage::url($psikolog->image) }}" alt="Current Image" class="w-20 h-20 mt-3 rounded-full">
                    @endif
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-[#756AB6] hover:bg-[#756AAA] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center text-lg font-semibold">
                        <span>Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
