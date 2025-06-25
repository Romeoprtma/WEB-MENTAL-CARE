@extends('layouts.mainPsikolog')
@section('editMeditasi')

<h2 class="text-3xl font-extrabold text-indigo-700 mb-4 text-center tracking-wide mt-4">Edit Meditasi</h2>
<form action="{{ route('kelolaMeditasiPsikolog.update', $meditasi->id) }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-gradient-to-br from-blue-50 to-indigo-100 p-8 rounded-2xl shadow-lg border border-indigo-200">
    @csrf
    @method('PUT')
    <div class="mb-5">
        <label for="title" class="block text-indigo-700 font-semibold mb-1">Judul Meditasi</label>
        <input type="text" name="title" id="title" value="{{ old('title', $meditasi->title) }}" class="w-full border-2 border-indigo-200 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-400 transition" required>
    </div>

    <div class="mb-5">
        <label for="description" class="block text-indigo-700 font-semibold mb-1">Deskripsi</label>
        <textarea name="description" id="description" rows="4" class="w-full border-2 border-indigo-200 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-400 transition resize-none" required>{{ old('description', $meditasi->description) }}</textarea>
    </div>
    <div class="mb-5">
        <label for="category" class="block text-indigo-700 font-semibold mb-1">Kategori</label>
        <select name="category" id="category" class="w-full border-2 border-indigo-200 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-400 transition" required>
            <option value="" hidden selected>Pilih Kategori</option>
            <option value="relaksasi" {{ old('category', $meditasi->category) === 'relaksasi' ? 'selected' : '' }}>Relaksasi</option>
            <option value="tidur" {{ old('category', $meditasi->category) === 'tidur' ? 'selected' : '' }}>Tidur</option>
            <option value="fokus" {{ old('category', $meditasi->category) === 'fokus' ? 'selected' : '' }}>Fokus</option>
        </select>
    </div>
    <div class="mb-5">
        <label for="audio_file" class="block text-indigo-700 font-semibold mb-1">File Audio (mp3)</label>
        <input type="file" name="audio_file" id="audio_file" accept="audio/mp3,audio/mpeg" class="w-full mt-1 border-2 border-indigo-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:border-indigo-400 transition" required>
    </div>
    {{-- <div class="mb-5">
        <label for="duration" class="block text-indigo-700 font-semibold mb-1">Durasi</label>
        <input type="text" name="duration" id="duration" value="{{ old('duration', $meditasi->formatted_duration ?? '') }}" class="w-full border-2 border-indigo-200 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-400 transition" required>
        <small class="text-indigo-600">Contoh: 05:30 untuk 5 menit 30 detik</small>
    </div> --}}
    <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-3 rounded-xl shadow-md hover:from-indigo-600 hover:to-blue-600 transition text-lg">
        Simpan
    </button>
</form>
@endsection
