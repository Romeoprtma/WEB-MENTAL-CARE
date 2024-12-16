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
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" class="mt-1 block w-full p-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:text-sm">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Gambar -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('image')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
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
@endsection
