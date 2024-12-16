@extends('layouts.main')

@section('profile')
<section class="min-h-screen py-8 px-4 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white text-center mb-6">Profile Saya</h1>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @if(session('success'))
                <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('updateProfile') }}" class="ml-2" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex justify-center items-center flex-col w-auto mb-4 mt-4">
                    <div class="rounded-full overflow-hidden">
                        @if($users->image)
                            <!-- Tampilkan gambar user jika ada -->
                            <img src="{{ Storage::url($users->image) }}" alt="User Image" class="w-10 h-10 rounded-full mx-auto">
                        @else
                            <!-- Jika tidak ada, tampilkan gambar default -->
                            <svg class="rounded-full text-gray-800 dark:text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 448 512">
                                <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
                            </svg>
                        @endif
                    </div>
                    <input type="file" name="image" class="mt-4 text-gray-800 dark:text-white rounded-lg px-4 py-2 border">
                </div>
                <label for="nama" class="block text-gray-800 dark:text-gray-200 font-semibold mb-2">Nama Lengkap</label>
                <input type="text" id="nama" name="name" value="{{ $users->name }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                <label for="email" class="mt-2 block text-gray-800 dark:text-gray-200 font-semibold mb-2">Email</label>
                <input type="text" id="email" name="email" value="{{ $users->email }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                <label for="phone" class="mt-2 block text-gray-800 dark:text-gray-200 font-semibold mb-2">Nomer Hp</label>
                <input type="text" id="phone" name="phone" value="{{ $users->phone }}" required placeholder="Masukkan nomer telpon Anda" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                <label for="address" class="mt-2 block text-gray-800 dark:text-gray-200 font-semibold mb-2">Alamat</label>
                <input type="text" id="address" name="address" value="{{ $users->address }}" required placeholder="Masukkan alamat Anda" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                <div class="text-right flex justify-center">
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
