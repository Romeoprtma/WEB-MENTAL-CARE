@extends('layouts.mainAdmin')
@section('editLagu')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">EDIT LAGU</h1>
        <div class="bg-white p-2">
            <form action="{{ route('kelolaMeditasi.update', $meditasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="title">Title</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#756AB6]" type="text" name="title" id="title" value="{{ $meditasi->title }}" required>
                </div>

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-5">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ $meditasi->description }}</textarea>
                </div>
                <div class="mb-5">
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="category" id="category" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        <option value="" hidden selected>Pilih Kategori</option>
                        <option value="relaksasi" {{ $meditasi->category === 'relaksasi' ? 'selected' : '' }}>Relaksasi</option>
                        <option value="tidur" {{ $meditasi->category === 'tidur' ? 'selected' : '' }}>Tidur</option>
                        <option value="fokus" {{ $meditasi->category === 'fokus' ? 'selected' : '' }}>Fokus</option>
                    </select>
                </div>
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
