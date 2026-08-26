<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Zay — Portfolio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body>
    <div class="site-paper"></div>
    <div class="site-grain"></div>

    <header class="site-header">
        <a href="{{ url('/') }}" class="site-brand" aria-label="Kembali ke halaman utama">Zay<span>.</span></a>

        <nav class="site-nav" aria-label="Navigasi utama">
            <a href="{{ url('/') }}#home">Home</a>
            <a href="{{ url('/') }}#about">Tentang Saya</a>
            <a href="{{ url('/') }}#skills">Skills</a>
            <a href="{{ url('/') }}#projects">Projects</a>
            <a href="{{ url('/') }}#contact">Contact</a>
        </nav>

        <a href="{{ url('/') }}#contact" class="header-contact">Mari ngobrol <span>↗</span></a>
    </header>

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
