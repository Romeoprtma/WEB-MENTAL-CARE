@extends('layouts.mainAdmin')
@section('kelolaPsikolog')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">KELOLA PSIKOLOG</h1>
        <a href="{{ route('kelolaPsikolog.create') }}">
        <button class="flex justify-center items-center gap-2 text-white bg-[#756AB6] rounded-lg p-2 mb-7">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
              </svg>
            <span>TAMBAH</span>
        </button></a>
        {{-- Table Psikolog --}}
        <div class="overflow-x-auto mb-6">
            <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-[#756AB6] text-white">
                    <tr>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">No</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Image</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Nama</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Deskripsi</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($psikologs as $index => $item)
                    <tr class="hover:bg-gray-100 transition-all">
                        <td class="text-center px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">
                            @if ($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="Psikolog Image" class="w-10 h-10 rounded-full mx-auto">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->name }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->deskripsi }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">
                            <form action="{{ route('kelolaPsikolog.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <!-- Delete Icon -->
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm-2 9a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1Zm13-6a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-4Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
