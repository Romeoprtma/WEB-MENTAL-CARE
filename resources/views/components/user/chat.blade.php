@extends('layouts.main')
@section('chat')
<livewire:chat :user="$user"/>
{{-- <div id="loadingScreen">
    <div class="loader"></div>
</div> --}}
@endsection
