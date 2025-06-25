@extends('layouts.mainPsikolog')
@section('chatPsikolog')
<livewire:chat :user="$user"/>
{{-- <div id="loadingScreen">
    <div class="loader"></div>
</div> --}}
@endsection
