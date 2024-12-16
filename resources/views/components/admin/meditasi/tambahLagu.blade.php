@extends('layouts.mainAdmin')
@section('tambahLagu')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <div class="bg-white p-4">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">Tambah Lagu Meditasi</h1>
            <form action="{{ route('kelolaMeditasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="title">Title</label>
                    <input class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" type="text" name="title" id="title" required>
                </div>

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="duration">Duration</label>
                    <input class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" type="text" name="duration" id="duration" required>
                </div>

                @error('duration')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="audio_file">Audio File</label>
                    <input class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" type="file" name="audio_file" id="audio_file" required>
                </div>

                @error('audio_file')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

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
