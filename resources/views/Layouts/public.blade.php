<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>@yield('title', 'Zahir Muzakkiy — Portfolio')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  :root{
    --bg: #090a10;
    --panel: #111220;
    --panel-2: #161829;
    --border: rgba(150,140,255,0.16);
    --text: #f2f1fb;
    --muted: #8b8aa3;
    --blue: #6a5cff;
    --blue-2: #4fd6ff;
    --radius: 16px;
  }
  *{margin:0;padding:0;box-sizing:border-box;}
  body{
    background:var(--bg);
    color:var(--text);
    font-family:'Inter',sans-serif;
    overflow-x:hidden;
    position:relative;
  }
  .bg-grid{
    position:fixed; inset:0;
    background-image:
      linear-gradient(rgba(148,168,255,0.05) 1px, transparent 1px),
      linear-gradient(90deg, rgba(148,168,255,0.05) 1px, transparent 1px);
    background-size:44px 44px;
    -webkit-mask-image:radial-gradient(ellipse 70% 60% at 50% 20%, black 30%, transparent 75%);
    mask-image:radial-gradient(ellipse 70% 60% at 50% 20%, black 30%, transparent 75%);
    z-index:0;
  }
  .glow{ position:fixed; border-radius:50%; filter:blur(90px); z-index:0; pointer-events:none; }
  .glow-1{ width:480px; height:480px; top:-160px; left:-120px; background:rgba(106,92,255,0.24); }
  .glow-2{ width:420px; height:420px; top:120px; right:-140px; background:rgba(79,214,255,0.14); }

  nav{
    position:sticky; top:0; z-index:50;
    display:flex; align-items:center; justify-content:space-between;
    padding:18px 48px;
    background:rgba(10,13,20,0.7);
    backdrop-filter:blur(14px);
    border-bottom:1px solid var(--border);
  }
  .logo{ font-family:'Sora',sans-serif; font-weight:700; font-size:1.05rem; color:var(--text); display:flex; align-items:center; gap:8px; text-decoration:none; }
  .zay{
    background:linear-gradient(100deg, var(--blue-2) 20%, #dff6ff 40%, var(--blue) 60%, var(--blue-2) 80%);
    background-size:250% auto;
    -webkit-background-clip:text; background-clip:text;
    -webkit-text-fill-color:transparent; color:transparent;
    animation:waterFlow 4s ease-in-out infinite;
  }
  @keyframes waterFlow{ 0%{background-position:0% center;} 50%{background-position:100% center;} 100%{background-position:0% center;} }
  .nav-links{ display:flex; gap:34px; list-style:none; }
  .nav-links a{ color:var(--muted); text-decoration:none; font-size:.92rem; font-weight:500; position:relative; transition:color .25s ease; }
  .nav-links a::after{ content:''; position:absolute; left:0; bottom:-6px; width:0; height:1.5px; background:var(--blue-2); transition:width .25s ease; }
  .nav-links a:hover{ color:var(--text); }
  .nav-links a:hover::after{ width:100%; }

  .section-wrap{ position:relative; z-index:1; max-width:1180px; margin:0 auto; padding:70px 48px; }
  .card-dark{ background:var(--panel); border:1px solid var(--border); border-radius:var(--radius); padding:32px; }
  .eyebrow-title{ font-family:'JetBrains Mono',monospace; font-size:.78rem; color:var(--blue-2); text-transform:uppercase; letter-spacing:1px; margin-bottom:12px; }
  h1,h2,h3{ font-family:'Bricolage Grotesque',sans-serif; }
  .grad-text{ background:linear-gradient(90deg, var(--blue-2), #a7c7ff); -webkit-background-clip:text; background-clip:text; color:transparent; }

  @keyframes fadeUp{ from{opacity:0; transform:translateY(16px);} to{opacity:1; transform:translateY(0);} }
  @keyframes blink{ 50%{ opacity:0; } }
  @keyframes pulse{ 0%{box-shadow:0 0 0 0 rgba(74,222,128,.55);} 70%{box-shadow:0 0 0 8px rgba(74,222,128,0);} 100%{box-shadow:0 0 0 0 rgba(74,222,128,0);} }
  @keyframes float{ 0%,100%{transform:translateY(0);} 50%{transform:translateY(-8px);} }

  @media (prefers-reduced-motion: reduce){ *{ animation:none !important; transition:none !important; } }
  @media (max-width:900px){
    nav{ padding:16px 24px; }
    .nav-links{ display:none; }
    .section-wrap{ padding:56px 24px; }
  }
</style>
</head>
<body>

<div class="bg-grid"></div>
<div class="glow glow-1"></div>
<div class="glow glow-2"></div>

<nav>
  <a href="/" class="logo">☰ <span class="zay">Zay</span></a>
  <ul class="nav-links">
    <li><a href="#home">Home</a></li>
    <li><a href="#about">Tentang Saya</a></li>
    <li><a href="#skills">Skills</a></li>
    <li><a href="#projects">Projects</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
</nav>

@yield('content')

</body>
</html>