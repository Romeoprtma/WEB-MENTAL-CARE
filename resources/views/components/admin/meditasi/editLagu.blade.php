@extends('layouts.mainAdmin')
@section('editLagu')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">EDIT LAGU</h1>
        <div class="bg-white p-2">
            <form action="{{ route('kelolaMeditasi.update', $kelolaMeditasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="title">Title</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#756AB6]" type="text" name="title" id="title" value="{{ $kelolaMeditasi->title }}" required>
                </div>

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="duration">Duration</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#756AB6]" type="text" name="duration" id="duration" value="{{ $kelolaMeditasi->duration }}" required>
                </div>

                @error('duration')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="audio_file">Audio File (Optional)</label>
                    <input  type="file" name="audio_file" id="audio_file">
                </div>

                @error('audio_file')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <button class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-[#756AB6] hover:bg-[#756AAA] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center text-lg font-semibold" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
