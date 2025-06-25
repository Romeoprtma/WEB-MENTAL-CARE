@extends('layouts.mainAdmin')
@section('approveTesKepribadian')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">KELOLA USER</h1>
        {{-- Table User --}}
        <div class="overflow-x-auto mb-6">
            <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-[#756AB6] text-white">
                    <tr>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">No</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Nama Psikolog</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Soal Tes</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Jadwal Input</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- @forelse ($users as $index => $item) --}}
                        <tr class="hover:bg-gray-100 transition-all">
                            <td class="text-center px-6 py-4 text-gray-700"></td>
                            <td class="text-center px-6 py-4 text-gray-700"></td>
                            <td class="text-center px-6 py-4 text-gray-700"></td>
                            <td class="text-center px-6 py-4 text-gray-700"></td>
                            <td class="text-center px-6 py-4 text-gray-700">
                                <form action="" method="POST" id="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-red-600 hover:text-red-800 deleteButton" data-id="">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm-2 9a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1Zm13-6a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    {{-- @empty --}}
                        {{-- <tr class="hover:bg-gray-100 transition-all">
                            <td class="text-center px-6 py-4 text-gray-700" colspan="8">No Data Available</td>
                        </tr> --}}
                    {{-- @endforelse --}}
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection