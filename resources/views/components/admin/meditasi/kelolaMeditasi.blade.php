@extends('layouts.mainAdmin')
@section('kelolaMeditasi')
    <div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">KELOLA MEDITASI</h1>
        <a href="{{ route('kelolaMeditasi.create') }}">
            <button class="flex justify-center items-center gap-2 text-white bg-[#756AB6] rounded-lg p-2 mb-7">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                  </svg>
                <span>TAMBAH</span>
            </button>
        </a>
        {{-- Table Lagu --}}
        <div class="overflow-x-auto mb-6">
            <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-[#756AB6] text-white">
                    <tr>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">No</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Meditasi</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Dibuat oleh</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Judul</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Deskripsi</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Kategori</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Durasi</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($songs as $index => $item)
                    <tr class="hover:bg-gray-100 transition-all">
                        <td class="text-center px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">
                            @if ($item->audio_file)
                                <audio controls><source src="{{ asset('storage/' . $item->audio_file) }}" type="audio/mp3"></audio>
                            @else
                                <span>No Audio</span>
                            @endif
                        </td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->creator->name }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->title }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->description }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->category }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->formatted_duration }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">
                            <div class="flex justify-center items-center gap-3">
                                {{-- Edit --}}
                                <a href="{{ route('kelolaMeditasi.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>
                                {{-- Approve --}}
                                @if($item->is_approved == false)
                                    <form action="{{ route('kelolaMeditasi.approve', $item->id) }}" method="POST" onsubmit="return confirmApprove(event, {{ $item->id }})" id="approveForm-{{ $item->id }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-600 hover:text-green-800 flex items-center justify-center">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 2a2 2 0 0 1-3.393 1.554l-.293-.293-5.615 5.615-2.293-2.293a1 1 0 0 1 1.414-1.414L7 7.586l5.293-5.293-.293-.293A2 2 0 1 1 16 2z"/>
                                                <path d="M13.293 4.707 8 10 6 8l-5 5h16z"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                                {{-- Delete --}}
                                <form action="{{ route('kelolaMeditasi.destroy', $item->id) }}" method="POST" id="deleteForm-{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="deleteButton text-red-600 hover:text-red-800 flex justify-center items-center" data-id="{{ $item->id }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"/>
                                            <path d="M5.5 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm2.5.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm3 .5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.deleteButton').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const itemId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data audio akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`deleteForm-${itemId}`).submit();
                }
            });
        });
    });

    function confirmApprove(event, id) {
        event.preventDefault();
        if (confirm("Yakin ingin meng-approve meditasi ini?")) {
            document.getElementById('approveForm-' + id).submit();
        }
    }
</script>
@endsection
