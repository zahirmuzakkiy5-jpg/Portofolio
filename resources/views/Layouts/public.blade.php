<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Zay — Portfolio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/portfolio-dark.css') }}">
    <style>
        .skip-link{position:fixed;left:12px;top:12px;z-index:200;padding:8px 11px;color:var(--bg);background:var(--bone);font:500 .65rem 'DM Mono';transform:translateY(-150%);transition:transform .2s}.skip-link:focus{transform:none}.form-label{display:block;color:var(--muted);font:500 .58rem 'DM Mono';letter-spacing:.04em}
    </style>
    @stack('head')
</head>
<body>
    <a class="skip-link" href="#main-content">Lewati ke konten</a>

    <header class="nav">
        <a class="brand" href="{{ url('/') }}" aria-label="Kembali ke halaman utama">ZAY<em>.</em></a>

        <nav class="navlinks" aria-label="Navigasi utama">
            <a href="{{ url('/') }}#projects">Work</a>
            <a href="{{ url('/') }}#about">About</a>
            <a href="{{ url('/all-projects') }}">Archive</a>
            <a href="{{ url('/') }}#skills">Stack</a>
            <a href="{{ url('/') }}#contact">Contact</a>
        </nav>

        <a class="status" href="{{ url('/') }}#contact">
            <span class="status-dot" aria-hidden="true"></span>
            Available for projects
        </a>
    </header>

    <main id="main-content">
        @yield('content')
    </main>

    <div class="cat-companion" id="catCompanion" aria-hidden="true">
        <svg viewBox="0 0 72 72" role="img" aria-label="Small white cat companion">
            <path d="M18 31V16l11 8c4-2 10-2 14 0l11-8v17c0 13-8 22-18 22S18 44 18 31Z" fill="#eeeae1"/>
            <circle cx="30" cy="34" r="2.2" fill="#090b0e"/>
            <circle cx="42" cy="34" r="2.2" fill="#090b0e"/>
            <path d="M34 40q2 3 4 0M21 38l-9-2M21 42l-9 2M51 38l9-2M51 42l9 2" fill="none" stroke="#eeeae1" stroke-width="1.6" stroke-linecap="round"/>
            <path class="cat-tail" d="M51 51q13 5 11-8" fill="none" stroke="#eeeae1" stroke-width="4" stroke-linecap="round"/>
        </svg>
    </div>

    <script src="{{ asset('js/portfolio-dark.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
