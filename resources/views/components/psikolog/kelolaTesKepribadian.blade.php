@extends('layouts.mainPsikolog')
@section('kelolaTesKepribadian')
<!-- Section: Kelola Tes Kepribadian -->
<div class="bg-white shadow-lg rounded-lg p-6 mb-10">
  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <div>
      <h2 class="text-2xl font-bold text-gray-900">Kelola Tes Kepribadian</h2>
      <p class="text-sm text-gray-600">Tambahkan atau ubah soal untuk tes kepribadian pengguna.</p>
    </div>
    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
      Tambah Soal
    </button>
  </div>

  <!-- Tabel Soal Tes Kepribadian -->
<div>
    <h1>Upload File Soal MBTI (Excel)</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('upload.soal') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</div>
</div>
@endsection
