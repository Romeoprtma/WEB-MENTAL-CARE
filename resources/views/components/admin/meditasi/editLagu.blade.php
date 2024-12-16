@extends('layouts.mainAdmin')
@section('editLagu')
<div class="p-4 sm:ml-64 flex justify-center">
    <div class="w-full max-w-6xl">
        <div class="bg-white p-2">
            <form action="{{ route('kelolaMeditasi.update', $kelolaMeditasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $kelolaMeditasi->title }}" required>
                </div>

                <div>
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" id="duration" value="{{ $kelolaMeditasi->duration }}" required>
                </div>

                <div>
                    <label for="audio_file">Audio File (Optional)</label>
                    <input type="file" name="audio_file" id="audio_file">
                </div>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
