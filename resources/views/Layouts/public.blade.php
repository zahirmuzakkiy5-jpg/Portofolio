<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Portfolio Saya')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/portfolio.css', 'resources/js/certificate-modal.js', 'resources/js/sidebar.js'])
</head>
<body class="@yield('page', 'page-default')">

    <nav class="navbar">
        <span class="navbar-brand" onclick="toggleSidebar()">Zahir</span>

        <div class="navbar-links">
            <a href="/">Home</a>
            <a href="/#about">Tentang Saya</a>
            <a href="/#skills">Skills</a>
            <a href="/#projects">Projects</a>
            <a href="/#contact">Contact</a>
        </div>
    </nav>

    <div id="sidebarOverlay" class="sidebar-overlay" onclick="closeSidebar()"></div>

    <aside id="sidebar" class="sidebar">
        <p class="sidebar-title">Zahir</p>
        <a href="/" class="sidebar-link">🏠 Home</a>
        <a href="/#about" class="sidebar-link">👤 Tentang Saya</a>
        <a href="/#skills" class="sidebar-link">🛠️ Skills</a>
        <a href="/#projects" class="sidebar-link">💼 Projects</a>
        <a href="/#contact" class="sidebar-link">✉️ Contact</a>
    </aside>

    @yield('content')

</body>
</html>