@extends('layouts.mainAdmin')

@section('kelolaUser')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-start">KELOLA USER</h1>

        {{-- Table Psikolog --}}
        <div class="overflow-x-auto mb-6">
            <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-[#756AB6] text-white">
                    <tr>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">No</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Nama</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Email</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Role</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($psikolog as $index => $item)
                    <tr class="hover:bg-gray-100 transition-all">
                        <td class="text-center px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->name }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->email }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->role }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">
                            <form action="{{ route('admin.delete', ['id' => $item->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <!-- Replace Text with SVG Icon -->
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

        {{-- Table User --}}
        <div class="overflow-x-auto mb-6">
            <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-[#756AB6] text-white">
                    <tr>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">No</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Nama</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Email</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Role</th>
                        <th class="text-center px-6 py-3 font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $index => $item)
                    <tr class="hover:bg-gray-100 transition-all">
                        <td class="text-center px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->name }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->email }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">{{ $item->role }}</td>
                        <td class="text-center px-6 py-4 text-gray-700">
                            <form action="{{ route('admin.delete', ['id' => $item->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <!-- Replace Text with SVG Icon -->
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
