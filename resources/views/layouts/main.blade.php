<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mental Care</title>
</head>
<body id="hideBody">
    @include('partials.navbar')
    <div>
        @yield('home')
        @yield('meditasi')
        @yield('tesKepribadian')
        @yield('listPsikolog')
        @yield('chat')
        @yield('profile')
    </div>
    @include('partials.footer')
    <script src="{{asset('js/loading.js')}}"></script>
</body>
</html>
