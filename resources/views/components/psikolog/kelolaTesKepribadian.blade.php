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
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
      <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-medium">
        <tr>
          <th class="px-6 py-3 text-left">Soal</th>
          <th class="px-6 py-3 text-left">Kategori</th>
          <th class="px-6 py-3 text-left">Tipe</th>
          <th class="px-6 py-3 text-left">Status</th>
          <th class="px-6 py-3 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <!-- Item Soal -->
        <tr>
          <td class="px-6 py-4 text-gray-900 font-medium">Saya nyaman berada di kerumunan orang</td>
          <td class="px-6 py-4 text-gray-700">Kepribadian Sosial</td>
          <td class="px-6 py-4 text-gray-700">Multiple Choice</td>
          <td class="px-6 py-4">
            <span class="inline-flex px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Aktif</span>
          </td>
          <td class="px-6 py-4 space-x-2">
            <button class="text-indigo-600 hover:text-indigo-900 flex items-center text-sm">
              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.732-6.732a2 2 0 012.828 0l.172.172a2 2 0 010 2.828L12 17H9v-3z" />
              </svg>
              Edit
            </button>
            <button class="text-red-600 hover:text-red-900 flex items-center text-sm">
              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
              Hapus
            </button>
          </td>
        </tr>
        <!-- Tambahkan baris lainnya sesuai kebutuhan -->
      </tbody>
    </table>
  </div>
</div>
@endsection