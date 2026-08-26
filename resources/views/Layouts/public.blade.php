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
        .skip-link{position:fixed;left:12px;top:12px;z-index:200;padding:8px 11px;color:var(--bg);background:var(--bone);font:500 .65rem 'DM Mono';transform:translateY(-150%);transition:transform .2s}.skip-link:focus{transform:none}.form-label{display:block;color:var(--muted);font:500 .58rem 'DM Mono';letter-spacing:.04em}.section-head-tools a{display:inline-flex;align-items:center;gap:12px;padding:12px 17px;color:var(--red);border:1px solid var(--red);background:rgba(226,74,57,.04);font:500 .72rem 'DM Mono';letter-spacing:.04em;text-decoration:none;text-transform:uppercase;box-shadow:0 0 20px rgba(226,74,57,.08)}.section-head-tools a:before{content:'↗';color:var(--bone);font-size:1rem;transition:transform .2s}.section-head-tools a:hover{color:var(--bone);border-color:var(--cyan);box-shadow:0 0 24px rgba(139,231,246,.16)}.section-head-tools a:hover:before{transform:translate(3px,-3px);color:var(--cyan)}
        .floating-decor{position:fixed;inset:70px 0 0;z-index:2;pointer-events:none;overflow:hidden}.floating-decor span{position:absolute;display:block;opacity:.5}.float-dot{width:5px;height:5px;border-radius:50%;background:var(--bone);box-shadow:0 0 13px rgba(238,234,225,.65);animation:floatDrift 9s ease-in-out infinite,ornamentBlink 4.8s steps(1,end) infinite}.float-dot.red{background:var(--red);box-shadow:0 0 13px rgba(226,74,57,.75);animation-duration:9s,5.7s}.float-dot.cyan{background:var(--cyan);box-shadow:0 0 13px rgba(139,231,246,.65);animation-duration:10.5s,6.3s}.float-square{width:10px;height:10px;border:1px solid var(--red);transform:rotate(45deg);animation:floatTwist 12s ease-in-out infinite,ornamentBlink 6.1s steps(1,end) infinite}.float-line{width:75px;height:1px;background:linear-gradient(90deg,transparent,var(--line),transparent);animation:floatLine 10s ease-in-out infinite,ornamentBlink 7.2s steps(1,end) infinite}.float-ring{width:42px;height:42px;border:1px solid rgba(238,234,225,.25);border-radius:50%;animation:floatRing 15s linear infinite,ornamentBlink 8.4s steps(1,end) infinite}.float-ring:after{content:'';position:absolute;top:-3px;left:50%;width:5px;height:5px;border-radius:50%;background:var(--cyan);box-shadow:0 0 12px var(--cyan)}.fd1{left:8%;top:22%;animation-delay:-2s,-.9s}.fd2{left:22%;top:70%;animation-delay:-5s,-3.2s}.fd3{right:9%;top:31%;animation-delay:-3s,-1.8s}.fd4{right:25%;top:76%;animation-delay:-7s,-4.6s}.fd5{left:47%;top:15%;animation-delay:-4s,-2.5s}.fd6{right:43%;top:58%;animation-delay:-1s,-5.3s}.fd7{left:13%;top:47%;animation-delay:-6s,-1.1s}.fd8{right:6%;top:78%;animation-delay:-8s,-3.8s}.fd9{left:37%;top:88%;animation-delay:-4s,-6.4s}.float-diamond{width:9px;height:9px;border:1px solid var(--cyan);transform:rotate(45deg);animation:floatTwist 14s ease-in-out infinite,ornamentBlink 5.9s steps(1,end) infinite}.fd10{right:16%;top:18%;animation-delay:-9s,-2.2s}.fd11{left:31%;top:38%;animation-delay:-11s,-4.1s}.fd12{right:34%;top:84%;animation-delay:-6s,-.5s}@keyframes floatDrift{0%,100%{transform:translate3d(0,0,0);opacity:.28}35%{transform:translate3d(16px,-21px,0);opacity:.7}68%{transform:translate3d(-11px,-7px,0);opacity:.4}}@keyframes floatTwist{0%,100%{transform:rotate(45deg) translate(0,0);opacity:.3}50%{transform:rotate(155deg) translate(12px,-17px);opacity:.78}}@keyframes floatLine{0%,100%{transform:translateX(0) rotate(-8deg);opacity:.2}50%{transform:translateX(34px) rotate(8deg);opacity:.75}}@keyframes floatRing{to{transform:rotate(360deg)}}@keyframes ornamentBlink{0%,34%,100%{opacity:.22;filter:brightness(.8)}38%,43%{opacity:.85;filter:brightness(1.75) drop-shadow(0 0 8px currentColor)}46%,55%{opacity:.38;filter:brightness(1)}60%,67%{opacity:.72;filter:brightness(1.35) drop-shadow(0 0 5px currentColor)}}@media(prefers-reduced-motion:reduce){.floating-decor,.floating-decor *{animation:none!important}.floating-decor span{opacity:.35}}
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

    <div class="floating-decor" aria-hidden="true"><span class="float-dot fd1"></span><span class="float-dot red fd2"></span><span class="float-dot cyan fd3"></span><span class="float-square fd4"></span><span class="float-line fd5"></span><span class="float-ring fd6"></span><span class="float-dot red fd7"></span><span class="float-line fd8"></span><span class="float-square fd9"></span><span class="float-diamond fd10"></span><span class="float-diamond fd11"></span><span class="float-dot cyan fd12"></span></div>

    <main id="main-content">
        @yield('content')
    </main>

    <script src="{{ asset('js/portfolio-dark.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
