@extends('layouts.main') {{-- atau layoutmu sendiri --}}
@section('hasilTes')
    <div class="text-center mt-10">
        <h1 class="text-3xl font-bold">Hasil Tes Kepribadian</h1>
        <p class="text-xl mt-4">Tipe kepribadian kamu adalah:</p>
        <p class="text-4xl font-bold text-[#756AB6] mt-4">{{ $hasil }}</p>
    </div>
@endsection
