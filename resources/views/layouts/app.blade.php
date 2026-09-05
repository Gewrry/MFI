<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- SEO --}}
    <title>@yield('title', 'Makati Foundry, Inc. — Quality Valves, Hydrants, Fittings & Blue Star uPVC Pipes')</title>
    <meta name="description" content="@yield('meta_description', 'Makati Foundry, Inc. manufactures quality valves, fire hydrants, pipe fittings, and Blue Star uPVC pipes for waterworks, construction, and fire safety applications in the Philippines.')">
    <meta name="keywords" content="@yield('meta_keywords', 'gate valve, fire hydrant, pipe fittings, uPVC pipe, butterfly valve, check valve, air release valve, manhole cover, Philippines waterworks')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Makati Foundry, Inc.">
    <meta property="og:title" content="@yield('og_title', 'Makati Foundry, Inc. — Quality Industrial Waterworks Products')">
    <meta property="og:description" content="@yield('og_description', 'Manufacturer of quality valves, fire hydrants, fittings, and Blue Star uPVC pipes. Serving contractors, LGUs, and waterworks projects across the Philippines.')">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite Assets --}}
    @if(file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app-Bk0LSVox.css') }}">
        <script defer src="{{ asset('build/assets/app-CmMqXTPr.js') }}"></script>
    @endif

    {{-- Favicon --}}
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="shortcut icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}">

    @stack('head')
</head>
<body x-data="{ mobileOpen: false, scrolled: false }" @scroll.window="scrolled = (window.scrollY > 60)">

    {{-- NAVBAR --}}
    @include('partials.nav')

    {{-- MAIN CONTENT --}}
    <main id="main-content">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    @stack('scripts')
</body>
</html>
