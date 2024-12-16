@extends('layouts.main')
@section('tesKepribadian')
    {{-- Hero --}}
    <section class="flex justify-center items-center bg-[#756AB6] min-h-screen">
        <div class="title-hero text-white">
            <h1 class="text-[42px] font-bold">Tes Kepribadian</h1>
            <h3 class=" py-2 max-w-[500px] mr-[54px]">Temukan potensi diri Anda dengan tes kepribadian
                yang mendalam dan akurat. Dengan hasil yang mudah dipahami, Anda bisa mengeksplorasi
                kekuatan dan tantangan pribadi, serta mendapatkan wawasan yang berguna untuk pengembangan
                diri dan hubungan sosial.</h3>
        </div>
        <div class="img-hero flex justify-center lg:justify-end w-full lg:w-auto">
            <img src="{{asset('/img/tesKepribadian.png')}}" width="350px" height="350px" alt="">
        </div>
    </section>

    {{-- SOAL TES --}}
<section class="mt-11">
    <h1 class="text-[32px] font-bold text-center mb-11">INSTRUKSI PENGISIAN SOAL</h1>
    <p class="text-lg  text-[#5d519f] font-bold text-justify px-[200px]">Di bawah ini ada 60 nomor. Masing-masing nomor memiliki dua pernyataan yang bertolak belakang (PERNYATAAN A & B). Pilihlah salah satu pernyataan yang paling sesuai dengan diri Anda dengan mengetik angka "1" pada kolom yang sudah disediakan (KOLOM ISIAN). Anda HARUS memilih salah satu yang dominan serta mengisi semua nomor. Lebih jelasnya lihat Contoh di Sheet 2.</p>
    <form id="dataForm" class="text-center">
        <div id="questionContainer" class="mb-5">
            <!-- Input fields will be dynamically generated here -->
        </div>
        <button type="button" id="submitButton" class="bg-[#756AB6] text-white px-6 py-3 rounded-lg hover:bg-[#5d519f]">
            Kirim Data
        </button>
    </form>
</section>

<div id="loadingScreen">
    <div class="loader"></div>
</div>
{{-- END SOAL TES --}}


    {{-- MBTI Test Results --}}
<section id="testResults" class="mt-11 hidden">
    <h1 class="text-[32px] font-bold text-center">Hasil Tes</h1>
    <div class="text-center flex justify-center items-center flex-wrap gap-6">
        <!-- Introvert Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">Introvert</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $optionA1 }}</p>
        </div>

        <!-- Ekstrovert Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">Ekstrovert</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $optionB1 }}</p>
        </div>

        <!-- Sensing Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">Sensing</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $optionA2 }}</p>
        </div>

        <!-- Intuition Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">Intuition</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $optionB2 }}</p>
        </div>

        <!-- Thinking Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">Thinking</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $optionA3 }}</p>
        </div>

        <!-- Feeling Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">Feeling</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $optionB3 }}</p>
        </div>

        <!-- Judging Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">Judging</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $optionA4 }}</p>
        </div>

        <!-- Perceiving Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">Perceiving</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $optionB4 }}</p>
        </div>
    </div>
</section>

{{-- Kesimpulan --}}
<section id="testConclusion" class="mt-11 hidden">
    <h1 class="text-[32px] font-bold text-center">KEPRIBADIAN ANDA</h1>
    <div class="text-center flex justify-center items-center flex-wrap gap-6">
        <!-- Introvert Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">{{ $string1 }}</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $choice1 }}</p>
        </div>

        <!-- Ekstrovert Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">{{ $string2 }}</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $choice2 }}</p>
        </div>

        <!-- Sensing Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">{{ $string3 }}</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $choice3 }}</p>
        </div>

        <!-- Intuition Card -->
        <div class="w-1/4 p-6 bg-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h1 class="text-xl font-semibold text-[#4A4A4A]">{{ $string4 }}</h1>
            <p class="text-2xl font-bold text-[#756AB6]">{{ $choice4 }}</p>
        </div>
    </div>

    <div class="flex justify-center items-center">

    <a href="{{ url('printTes') }}" class=" cursor-pointer" >
        <button type="submit" class="bg-[#756AB6] mt-8 text-white px-6 py-3 rounded-lg hover:bg-[#5d519f]">
            Download Hasil Test
        </button>
    </a>
</div>
</section>

<script>
    const questionContainer = document.getElementById("questionContainer");
    const submitButton = document.getElementById("submitButton");
    const totalQuestions = 60;

    // URL Apps Script
    const scriptURL = "https://script.google.com/macros/s/AKfycby7E2Bu38cf97borPc6Yw5hHDHu1cj1Bg2aswBQFAp7cGTrWZ-x3HkxmIBasDBk_SU/exec";

    // Ambil data dari Apps Script
    fetch(scriptURL)
        .then(response => response.json())
        .then(data => {
            if (data.questions) {
                // Iterasi data questions dari Apps Script
                data.questions.forEach((item, index) => {
                    const questionDiv = document.createElement("div");
                    questionDiv.className = "mb-3 text-left";

                    questionDiv.innerHTML = `
                        <p class="mt-11 text-[25px] text-opacity-70 text-[#5d519f] font-bold text-center mb-4">A. ${item.questionA}</p>
                        <p class="text-[25px] text-opacity-70 text-[#5d519f] font-bold text-center mb-4">B. ${item.questionB}</p>
                        <div class="flex justify-center gap-8">
                            <!-- Opsi A -->
                            <label class="flex flex-col items-center gap-2 cursor-pointer group">
                                <input
                                    type="radio"
                                    name="answers[${index}]"
                                    value="A"
                                    class="hidden peer"
                                >
                                <div class="w-8 h-8 flex justify-center items-center border-2 border-[#5d519f] rounded-full group-hover:border-[#3b2a88] transition-all peer-checked:bg-[#5d519f] peer-checked:border-[#5d519f]">
                                    <span class="block w-4 h-4 rounded-full bg-white scale-0 peer-checked:scale-100 transition-all"></span>
                                </div>
                                <span class="text-[#5d519f] text-lg font-semibold group-hover:text-[#3b2a88] transition-all">Pilihan A</span>
                            </label>

                            <!-- Opsi B -->
                            <label class="flex flex-col items-center gap-2 cursor-pointer group">
                                <input
                                    type="radio"
                                    name="answers[${index}]"
                                    value="B"
                                    class="hidden peer"
                                >
                                <div class="w-8 h-8 flex justify-center items-center border-2 border-[#5d519f] rounded-full group-hover:border-[#3b2a88] transition-all peer-checked:bg-[#5d519f] peer-checked:border-[#5d519f]">
                                    <span class="block w-4 h-4 rounded-full bg-white scale-0 peer-checked:scale-100 transition-all"></span>
                                </div>
                                <span class="text-[#5d519f] text-lg font-semibold group-hover:text-[#3b2a88] transition-all">Pilihan B</span>
                            </label>
                        </div>
                    `;

                    questionContainer.appendChild(questionDiv);
                });
            } else {
                alert("Tidak ada data pertanyaan yang tersedia.");
            }
        })
        .catch(error => {
            console.error("Error fetching data:", error);
            alert("Gagal mengambil data pertanyaan. Silakan coba lagi.");
        })
        .finally(() => {
            hideLoader();
        });

    // Submit data to Laravel
    submitButton.addEventListener("click", function () {
        showLoader();
        submitButton.disabled = true; // Disable button to prevent multiple clicks

        const formData = new FormData(document.getElementById("dataForm"));

        fetch("{{ route('submit.answers') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
            document.getElementById('testResults').classList.remove('hidden');
                document.getElementById('testConclusion').classList.remove('hidden');
            }
        })
        .catch(error => alert("Error: " + error.message))
        .finally(() => {
            hideLoader();
            submitButton.disabled = false; // Enable button after request completes
        });
    });
</script>
@endsection
