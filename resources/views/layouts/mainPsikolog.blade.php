<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mental Care</title>
</head>
<body id="hideBody">
    @include('partials.navbarPsikolog')
    <div>
        @yield('dashboardPsikolog')
        @yield('kelolaMeditasiPsikolog')
        @yield('kelolaTesKepribadian')
        @yield('riwayatChat')
        @yield('editProfilePsikolog')
        @yield('tambahMeditasi')
        @yield('chatPsikolog')
        @yield('editMeditasi')
    </div>
    @include('partials.footer')
    <script src="{{asset('js/loading.js')}}"></script>
</body>
</html>
