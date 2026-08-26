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
    <style>
        :root {
            --paper: #f4f1eb;
            --paper-deep: #e6e0d5;
            --ink: #151515;
            --ink-soft: #5f5b55;
            --line: #cfc8bc;
            --red: #b84535;
            --navy: #1b2738;
            --white: #fffdf8;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; background: var(--paper); color: var(--ink); }
        a { color: inherit; }
        button, input, textarea { font: inherit; }

        .site-paper {
            position: fixed;
            inset: 0;
            z-index: -3;
            pointer-events: none;
            background: var(--paper);
        }

        .site-grain {
            position: fixed;
            inset: 0;
            z-index: -2;
            pointer-events: none;
            opacity: .16;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.75' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='.16'/%3E%3C/svg%3E");
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            min-height: 76px;
            padding: 0 5vw;
            background: rgba(244, 241, 235, .94);
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(12px);
        }

        .site-brand {
            color: var(--ink);
            font: 800 1.6rem/1 'DM Sans', sans-serif;
            letter-spacing: -.08em;
            text-decoration: none;
        }

        .site-brand span { color: var(--red); }

        .site-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: clamp(16px, 3vw, 42px);
            margin-left: auto;
        }

        .site-nav a {
            position: relative;
            color: var(--ink-soft);
            font: 500 .78rem/1 'DM Mono', monospace;
            text-decoration: none;
            transition: color .2s ease;
        }

        .site-nav a::after {
            content: '';
            position: absolute;
            right: 0;
            bottom: -9px;
            left: 0;
            height: 2px;
            background: var(--red);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .2s ease;
        }

        .site-nav a:hover { color: var(--red); }
        .site-nav a:hover::after { transform: scaleX(1); }

        .header-contact {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 11px 14px;
            color: var(--white);
            background: var(--ink);
            font: 500 .72rem 'DM Mono', monospace;
            text-decoration: none;
            transition: background .2s ease, transform .2s ease;
        }

        .header-contact:hover { background: var(--red); transform: translateY(-2px); }
        .header-contact span { color: #f0b19f; }

        @media (max-width: 720px) {
            .site-header { min-height: 68px; padding: 0 20px; }
            .site-nav { gap: 13px; }
            .site-nav a { font-size: .64rem; }
            .header-contact { display: none; }
        }
    </style>
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
