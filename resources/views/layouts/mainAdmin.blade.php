<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Admin</title>
    @livewireStyles
    @stack('css')
</head>
<body class="bg-[#F5EFFF]">
    @include('partials.sidebar')
    <div>
        @yield('homeAdmin')
        @yield('kelolaUser')
        @yield('kelolaPsikolog')
        @yield('tambahPsikolog')
        @yield('editPsikolog')
        @yield('kelolaMeditasi')
        @yield('tambahLagu')
        @yield('editLagu')
    </div>
    @include('partials.footer')
    @livewireScripts
    @stack('js')
</body>

</html>
