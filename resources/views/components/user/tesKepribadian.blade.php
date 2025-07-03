@extends('layouts.main')

@section('tesKepribadian')
    {{-- Hero Section --}}
    <section class="flex flex-col md:flex-row justify-center items-center bg-[#756AB6] min-h-screen px-6 py-10 text-white">
        <div class="text-center md:text-left md:mr-10 mb-8 md:mb-0">
            <h1 class="text-4xl lg:text-5xl font-bold">Tes Kepribadian</h1>
            <p class="py-2 mt-2 max-w-lg text-lg leading-relaxed">
                Temukan potensi diri Anda dengan tes yang mendalam dan akurat untuk mendapatkan wawasan berguna bagi pengembangan diri.
            </p>
        </div>
        <div class="flex-shrink-0">
            <img src="{{ asset('/img/tesKepribadian.png') }}" width="350px" height="350px" alt="Ilustrasi Tes Kepribadian">
        </div>
    </section>

{{-- SOAL TES --}}
<section class="bg-gray-50 py-16 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-800">INSTRUKSI PENGISIAN SOAL</h1>
            <p class="text-base text-gray-600 mt-2 max-w-3xl mx-auto">
                Di bawah ini ada 60 nomor. Pilihlah **satu** dari dua pernyataan di setiap nomor yang paling sesuai dengan diri Anda. Anda **HARUS** mengisi semua nomor untuk melihat hasil.
            </p>
        </div>
        
        <form action="{{ route('tes.submit') }}" method="POST">
            @csrf
            <div id="questionContainer" class="space-y-8">
                
                @forelse ($soals as $soal)
                    <div class="question-card bg-white p-5 sm:p-6 rounded-xl shadow-md border border-gray-200">
                        <p class="text-lg font-semibold text-gray-900 mb-5">
                            {{-- PERBAIKAN 1: Menggunakan nomor urut dari loop ($loop->iteration) agar pasti benar dan urut --}}
                            {{ $loop->iteration }}. Mana yang lebih menggambarkan diri Anda?
                        </p>
                        
                        <div class="space-y-4">
                            {{-- Opsi A --}}
                            <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer group transition-all duration-200 hover:border-[#756AB6] has-[:checked]:border-[#756AB6] has-[:checked]:bg-[#756AB6] has-[:checked]:shadow-lg">
                                {{-- 
                                    PERBAIKAN 2 (Paling Penting): Menggunakan ID unik dari soal untuk 'name'.
                                    Ini adalah kunci untuk memperbaiki error Anda.
                                --}}
                                <input type="radio" name="jawaban[{{ $soal->id }}]" value="A" class="hidden" required>
                                <span class="text-base font-medium text-gray-700 group-has-[:checked]:text-white">
                                    {{ $soal->pernyataan_a }}
                                </span>
                            </label>
                            
                            {{-- Opsi B --}}
                            <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer group transition-all duration-200 hover:border-[#756AB6] has-[:checked]:border-[#756AB6] has-[:checked]:bg-[#756AB6] has-[:checked]:shadow-lg">
                                {{-- 'name' di sini juga menggunakan ID unik soal yang sama dengan Opsi A --}}
                                <input type="radio" name="jawaban[{{ $soal->id }}]" value="B" class="hidden" required>
                                <span class="text-base font-medium text-gray-700 group-has-[:checked]:text-white">
                                    {{ $soal->pernyataan_b }}
                                </span>
                            </label>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 px-6 bg-white rounded-lg shadow-md">
                        <p class="text-gray-600 text-lg">Soal tes tidak tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            @if($soals->isNotEmpty())
                <div class="text-center mt-12">
                    <button type="submit" id="submitButton" class="bg-[#756AB6] text-white px-10 py-3 rounded-lg text-lg font-semibold hover:bg-[#5d519f] transition-colors duration-300">
                        Kirim Jawaban & Lihat Hasil
                    </button>
                </div>
            @endif
        </form>
    </div>
</section>
@endsection