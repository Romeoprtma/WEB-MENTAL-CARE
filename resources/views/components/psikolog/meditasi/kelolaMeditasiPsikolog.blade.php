@extends('layouts.mainPsikolog')
@section('kelolaMeditasiPsikolog')
<!-- Section: Kelola Meditasi -->
<div class="bg-white shadow-lg rounded-lg p-6 mb-10">
  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <div>
      <h2 class="text-2xl font-bold text-gray-900">Kelola Meditasi</h2>
      <p class="text-sm text-gray-600">Tambahkan, ubah, atau hapus konten meditasi sesuai kebutuhan pengguna.</p>
    </div>
    <a href="{{route('kelolaMeditasiPsikolog.create')}}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
      </svg>
      Tambah Meditasi
    </a>
  </div>

  <!-- Tabel Meditasi -->
<div class="overflow-x-auto rounded-lg border border-gray-200">
    <table class="min-w-full bg-white text-sm">
        <thead class="bg-indigo-50 text-indigo-700 uppercase text-xs font-semibold">
            <tr>
                <th class="px-14 py-2 text-center">No</th>
                <th class="px-14 py-2 text-center">Judul</th>
                <th class="px-14 py-2 text-center">Deskripsi</th>
                <th class="px-14 py-2 text-center">Durasi</th>
                <th class="px-14 py-2 text-center">Kategori</th>
                <th class="px-14 py-2 text-center">Audio File</th>
                <th class="px-14 py-2 text-center">Status</th>
                <th class="px-14 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item Meditasi -->
            @foreach ($songs as $index =>$item)
            <tr class="transition">
                <td class="px-14 py-4 text-center font-medium text-gray-900">{{$index+1}}</td>
                <td class="px-14 py-4 text-center font-medium text-gray-900">{{$item->title}}</td>
                <td class="px-14 py-4 text-center font-medium text-gray-900">{{$item->description}}</td>
                <td class="px-14 py-4 text-center text-gray-700">{{$item->formatted_duration}}</td>
                <td class="px-14 py-4 text-center text-gray-700">{{$item->category}}</td>
                <td class="px-14 py-4 text-center">
                    @if ($item->audio_file)
                        <audio controls><source src="{{ asset('storage/' . $item->audio_file) }}" type="audio/mp3"></audio>
                    @else
                        <span>No Audio</span>
                    @endif
                </td>
                <td class="px-14 py-4 text-center font-medium text-gray-900">{{$item->status}}</td>
                <td class="px-14 py-4 flex justify-center gap-2">
                    <form action="{{route('kelolaMeditasiPsikolog.edit', $item->id)}}">
                        <button class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-700 rounded hover:bg-indigo-200 transition text-xs font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.732-6.732a2 2 0 012.828 0l.172.172a2 2 0 010 2.828L12 17H9v-3z" />
                            </svg>
                            Edit
                        </button>
                    </form>
                    <form action="{{ route('kelolaMeditasiPsikolog.destroy', $item->id) }}" method="POST" id="deleteForm-{{ $item->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus meditasi ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-xs font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
