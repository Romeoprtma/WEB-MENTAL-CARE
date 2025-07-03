@extends('layouts.mainAdmin')
@section('approveTesKepribadian')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">KELOLA TES KEPRIBADIAN</h1>
        <div class="overflow-x-auto mb-6">
            <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-[#756AB6] text-white">
                    <tr>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">No</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Pernyataan A</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Pernyataan B</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Dimensi</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Jadwal Input</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tempTes as $index => $item)
                        <tr class="hover:bg-gray-100 transition-all">
                            <td class="text-center px-6 py-4 text-gray-700">{{ $item->nomor }}</td>
                            <td class="text-center px-6 py-4 text-gray-700">{{ $item->pernyataan_a }}</td>
                            <td class="text-center px-6 py-4 text-gray-700">{{ $item->pernyataan_b }}</td>
                            <td class="text-center px-6 py-4 text-gray-700">{{ $item->dimensi }}</td>
                            <td class="text-center px-6 py-4 text-gray-700">{{ $item->created_at }}</td>
                            <td class="text-center px-6 py-4 text-gray-700">
                                <form action="{{ route('admin.approveTes.store') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                        Approve
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Tidak ada soal yang menunggu persetujuan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
