@extends('layouts.mainAdmin')
@section('homeAdmin')
<div class="p-4 sm:ml-64 ">
    <div class="p-4 mb-5 bg-[#FFFFFF] border border-black border-solid rounded-lg dark:border-gray-700">
        <div class="flex justify-start gap-4 items-center">
            <img src="{{asset('/img/user.png')}}" alt="users icon" width="30px" height="30px">
            <p class="text-lg font-bold">Total Users : {{ $registeredUsers }}</p>
        </div>
    </div>
    <div class="p-4 mb-5 bg-[#FFFFFF] border border-black border-solid rounded-lg dark:border-gray-700">
        <p class="text-xl font-bold mb-5">USERS</p>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <!-- Season Earnings -->
        <div class="flex flex-col items-center justify-center  h-[200px] p-4 rounded bg-[#756AB6] text-white">
                <p class="text-xl font-bold">USER</p>
                <p class="text-2xl font-extrabold">{{ $roleUser }}</p>
            </div>
            <!-- Today's Earnings -->
            <div class="flex flex-col items-center justify-center border border-black h-[200px] p-4 rounded text-black">
                <p class="text-xl font-bold">PSIKOLOG</p>
                <p class="text-2xl font-extrabold">{{ $rolePsikolog }}</p>
            </div>
        </div>
    </div>
    <div class="p-4 bg-[#FFFFFF] border border-black border-solid rounded-lg dark:border-gray-700">
    <div>
        <livewire:user-chart />
    </div>
</div>
</div>
@endsection
