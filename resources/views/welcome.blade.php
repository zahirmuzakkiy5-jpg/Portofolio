@extends('layouts.public')

@section('title', ($profile->name ?? 'Zahir Muzakkiy') . ' — Portfolio')

@push('head')
<style>
    :root {
        --paper: #f4f3ee;
        --paper-alt: #ebe9e2;
        --ink: #111111;
        --muted: #66645f;
        --line: #bdbab2;
        --red: #a83a2e;
        --white: #ffffff;
        --shadow: 0 18px 45px rgba(17, 17, 17, .12);
    }

    body {
        background: var(--paper);
        color: var(--ink);
        font-family: 'DM Sans', sans-serif;
    }

    .site-header {
        background: rgba(244, 243, 238, .96) !important;
        color: var(--ink) !important;
        border-color: var(--ink) !important;
    }

    .site-brand, .site-nav a { color: var(--ink) !important; }
    .site-brand span, .site-nav a:hover { color: var(--red) !important; }
    .header-contact { background: var(--ink) !important; }
    .header-contact:hover { background: var(--red) !important; }

    .editorial-page {
        width: min(1450px, 100%);
        margin: 0 auto;
        padding: 0 4vw 50px;
        overflow: hidden;
    }

    .hero-editorial {
        position: relative;
        min-height: 560px;
        display: grid;
        grid-template-columns: minmax(0, 1.18fr) minmax(360px, .82fr);
        align-items: center;
        gap: 35px;
        padding: 54px 0 28px;
        border-bottom: 1px solid var(--ink);
    }

    .hero-editorial::before {
        content: '01';
        position: absolute;
        top: 55px;
        left: 0;
        color: var(--red);
        font: 500 1.2rem 'DM Mono', monospace;
    }

    .hero-copy { padding: 38px 0 0 5vw; }

    .archive-label {
        display: inline-flex;
        gap: 15px;
        color: var(--muted);
        font: .68rem/1.4 'DM Mono', monospace;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    .archive-label::before { content: '/'; color: var(--red); }

    .hero-title {
        max-width: 850px;
        margin: 28px 0 24px;
        color: var(--ink);
        font: 800 clamp(3.5rem, 8.3vw, 8.9rem)/.78 'Playfair Display', serif;
        letter-spacing: -.075em;
        text-transform: uppercase;
    }

    .hero-title .red { color: var(--red); font-style: italic; }
    .hero-title .slash { color: var(--red); font-family: 'DM Sans', sans-serif; font-weight: 400; margin-left: .08em; }
    .hero-title .small-word { display: block; margin-top: 8px; font-size: .56em; letter-spacing: -.055em; }

    .hero-rule { width: min(760px, 100%); height: 2px; margin: 22px 0 26px; background: var(--ink); }

    .hero-description {
        max-width: 490px;
        color: var(--muted);
        font-size: .96rem;
        line-height: 1.7;
    }

    .hero-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 28px;
        margin-top: 28px;
        color: var(--muted);
        font: .68rem/1.5 'DM Mono', monospace;
        text-transform: uppercase;
    }

    .hero-meta strong { display: block; margin-top: 3px; color: var(--red); font-weight: 500; }

    .hero-actions { display: flex; gap: 18px; margin-top: 28px; }

    .editorial-button {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        padding: 12px 0;
        color: var(--ink);
        border-bottom: 1px solid var(--ink);
        font: 500 .72rem 'DM Mono', monospace;
        text-decoration: none;
        text-transform: uppercase;
        transition: color .2s ease, border-color .2s ease, transform .2s ease;
    }

    .editorial-button:hover { color: var(--red); border-color: var(--red); transform: translateX(4px); }
    .editorial-button.primary { color: var(--red); border-color: var(--red); }

    .hero-figure {
        position: relative;
        min-height: 520px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .hero-figure::before {
        content: '';
        position: absolute;
        inset: 8% 11% 0 7%;
        border-top: 1px solid var(--line);
        border-bottom: 1px solid var(--line);
        transform: skewY(-3deg);
        pointer-events: none;
    }

    .hero-figure::after {
        content: 'AVAILABLE FOR WORK';
        position: absolute;
        top: 8%;
        right: 0;
        color: var(--red);
        font: .62rem 'DM Mono', monospace;
        letter-spacing: .1em;
        transform: rotate(90deg) translateX(100%);
        transform-origin: right top;
    }

    .hero-person {
        position: relative;
        z-index: 2;
        width: min(100%, 420px);
        max-height: 560px;
        object-fit: contain;
        object-position: center bottom;
        filter: grayscale(1) contrast(1.08) drop-shadow(16px 18px 0 rgba(17, 17, 17, .07));
        mix-blend-mode: multiply;
        animation: personFloat 6s ease-in-out infinite;
    }

    .hero-placeholder {
        position: relative;
        z-index: 2;
        color: var(--muted);
        font: italic 4rem 'Playfair Display', serif;
        text-align: center;
    }

    .hero-note {
        position: absolute;
        z-index: 3;
        right: -8px;
        bottom: 18%;
        max-width: 160px;
        color: var(--ink);
        font: .68rem/1.5 'DM Mono', monospace;
        transform: rotate(-5deg);
    }

    .hero-note::before { content: '→'; display: block; color: var(--red); font-size: 1.6rem; }

    .selected-work {
        padding: 20px 0 0;
        border-bottom: 1px solid var(--ink);
    }

    .work-heading { display: flex; justify-content: space-between; align-items: end; gap: 20px; margin-bottom: 16px; }
    .section-label { color: var(--red); font: .68rem 'DM Mono', monospace; letter-spacing: .12em; text-transform: uppercase; }
    .work-heading h2 { margin: 6px 0 0; font: 700 clamp(1.6rem, 3vw, 2.5rem)/1 'Playfair Display', serif; }
    .work-heading a { color: var(--red); font: .68rem 'DM Mono', monospace; text-decoration: none; text-transform: uppercase; }

    .work-strip { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 12px; }

    .work-card {
        --rx: 0deg;
        --ry: 0deg;
        display: flex;
        flex-direction: column;
        min-height: 172px;
        background: var(--white);
        border: 1px solid var(--ink);
        transform: perspective(850px) rotateX(var(--rx)) rotateY(var(--ry));
        transition: transform .16s ease, background .2s ease, color .2s ease;
        transform-style: preserve-3d;
    }

    .work-card:hover { background: var(--ink); color: var(--white); }
    .work-card:hover .work-card-meta, .work-card:hover .work-card-link { color: #d7d3ca; }
    .work-card-image { width: 100%; height: 90px; object-fit: cover; filter: grayscale(1); border-bottom: 1px solid var(--ink); }
    .work-card-body { padding: 11px 13px; }
    .work-card-number { color: var(--red); font: .66rem 'DM Mono', monospace; }
    .work-card-title { margin: 7px 0 4px; font: 700 1rem 'Playfair Display', serif; }
    .work-card-meta, .work-card-link { color: var(--muted); font: .63rem 'DM Mono', monospace; text-decoration: none; }
    .work-card-link { display: block; margin-top: 13px; color: var(--red); }

    .supporting-section { padding: 90px 5vw; border-bottom: 1px solid var(--ink); }
    .supporting-grid { display: grid; grid-template-columns: .75fr 1.25fr; gap: 70px; align-items: start; }
    .supporting-grid h2 { margin: 0; font: 700 clamp(2.3rem, 5vw, 5rem)/.9 'Playfair Display', serif; letter-spacing: -.06em; }
    .supporting-copy { color: var(--muted); line-height: 1.8; }
    .supporting-sign { margin-top: 28px; color: var(--red); font: italic 1.5rem 'Playfair Display', serif; }

    .photo-secondary { width: min(100%, 440px); max-height: 330px; object-fit: cover; filter: grayscale(1); border: 1px solid var(--ink); }
    .skill-list { border-top: 1px solid var(--line); }
    .skill-item { padding: 15px 0; border-bottom: 1px solid var(--line); }
    .skill-item-top { display: flex; justify-content: space-between; gap: 15px; color: var(--ink); font-weight: 700; }
    .skill-item-top span { color: var(--red); font: .66rem 'DM Mono', monospace; }
    .skill-item p { margin: 6px 0 0; color: var(--muted); font-size: .84rem; line-height: 1.5; }
    .certificate-link { display: inline-block; margin-top: 7px; color: var(--red); border: 0; background: none; cursor: pointer; font: .72rem 'DM Mono', monospace; text-decoration: underline; }

    .contact-grid { display: grid; grid-template-columns: .8fr 1.2fr; gap: 70px; }
    .contact-grid h2 { margin: 0; font: 700 clamp(2.3rem, 5vw, 5rem)/.9 'Playfair Display', serif; letter-spacing: -.06em; }
    .contact-grid p { color: var(--muted); line-height: 1.7; }
    .contact-email { color: var(--red); font: .82rem 'DM Mono', monospace; text-decoration: none; border-bottom: 1px solid var(--red); }
    .contact-form { display: grid; gap: 12px; }
    .contact-form input, .contact-form textarea { width: 100%; padding: 14px; color: var(--ink); background: var(--white); border: 1px solid var(--ink); border-radius: 0; font: .82rem 'DM Mono', monospace; }
    .contact-form textarea { min-height: 140px; resize: vertical; }
    .contact-form button { width: fit-content; cursor: pointer; }
    .success-message { padding: 12px; border-left: 3px solid var(--red); color: var(--red); background: var(--paper-alt); }

    .editorial-footer { padding: 28px 0 0; color: var(--muted); font: .65rem 'DM Mono', monospace; text-align: center; }

    .modal-backdrop { display: none; position: fixed; inset: 0; z-index: 100; align-items: center; justify-content: center; padding: 24px; background: rgba(17, 17, 17, .82); }
    .modal-backdrop.is-open { display: flex; }
    .modal-card { position: relative; width: min(760px, 100%); max-height: 90vh; overflow: auto; padding: 22px; background: var(--paper); border: 1px solid var(--ink); }
    .modal-close { position: absolute; top: 10px; right: 10px; width: 34px; height: 34px; color: var(--white); background: var(--red); border: 0; cursor: pointer; font-size: 1.2rem; }
    #certModalContent { margin-top: 15px; text-align: center; }

    @keyframes personFloat { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-9px); } }
    @keyframes inkBlink { 0%, 46%, 100% { opacity: 1; } 47%, 55% { opacity: 0; } }
    @keyframes redPulse { 0%, 100% { opacity: .8; } 50% { opacity: 1; } }
    @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation: none !important; transition: none !important; } }

    .typing-cursor { display: inline-block; width: 7px; height: 1em; margin-left: 4px; background: var(--red); vertical-align: -2px; animation: inkBlink .9s steps(1, end) infinite; }
    .red-pulse { animation: redPulse 2.4s ease-in-out infinite; }

    @media (max-width: 900px) {
        .hero-editorial { min-height: auto; grid-template-columns: 1fr; padding-top: 75px; }
        .hero-copy { padding-left: 0; }
        .hero-figure { min-height: 470px; order: -1; }
        .hero-title { font-size: clamp(3.2rem, 12vw, 7rem); }
        .work-strip { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .supporting-grid, .contact-grid { grid-template-columns: 1fr; gap: 32px; }
    }

    @media (max-width: 560px) {
        .editorial-page { padding: 0 20px 35px; }
        .hero-editorial { padding-top: 58px; }
        .hero-title { font-size: clamp(2.75rem, 15vw, 5rem); }
        .hero-meta { gap: 14px; }
        .hero-figure { min-height: 390px; }
        .hero-note { right: 0; bottom: 6%; }
        .work-strip { grid-template-columns: 1fr; }
        .supporting-section { padding: 65px 0; }
    }
</style>
@endpush

@section('content')
<div class="editorial-page">
    <section class="hero-editorial" id="home">
        <div class="hero-copy">
            <div class="archive-label">Portfolio archive</div>
            <h1 class="hero-title">
                <span>Zahir</span>
                <span class="red">Muzakkiy</span><span class="slash"> /</span>
                <span class="small-word">Web Developer</span>
            </h1>
            <div class="hero-rule"></div>
            <p class="hero-description">
                {{ $profile->bio ?? 'Saya membangun website yang sederhana, berguna, dan terus berkembang — dengan rasa ingin tahu, kode, dan banyak percobaan.' }}
            </p>
            <div class="hero-meta">
                <div>Based in<strong>Indonesia</strong></div>
                <div>Focus<strong>Web development</strong></div>
                <div>Available<strong>For freelance</strong></div>
            </div>
            <div class="hero-actions">
                <a class="editorial-button primary" href="#projects">View selected work <span>→</span></a>
                <a class="editorial-button" href="#contact">Let's build <span>↗</span></a>
            </div>
            <p class="hero-description" style="margin-top: 18px; font: .68rem 'DM Mono', monospace;">
                <span id="heroRoleText">currently learning Laravel</span><span class="typing-cursor" aria-hidden="true"></span>
            </p>
        </div>

        <div class="hero-figure">
            @if ($profile && $profile->photo)
                <img class="hero-person" src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->name ?? 'Zahir Muzakkiy' }}">
            @else
                <div class="hero-placeholder">your<br>full-body<br>portrait</div>
            @endif
            <div class="hero-note">Focused on crafting things that matter.</div>
        </div>
    </section>

    <section class="selected-work" id="projects">
        <div class="work-heading">
            <div>
                <div class="section-label">02 / Selected works</div>
                <h2>Projects in progress.</h2>
            </div>
            <a href="{{ url('/all-projects') }}">All projects →</a>
        </div>

        <div class="work-strip">
            @forelse ($projects->take(4) as $project)
                <article class="work-card" data-tilt-card>
                    @if ($project->image)
                        <img class="work-card-image" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    @endif
                    <div class="work-card-body">
                        <div class="work-card-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                        <h3 class="work-card-title">{{ $project->title }}</h3>
                        <div class="work-card-meta">{{ \Illuminate\Support\Str::limit($project->description, 55) }}</div>
                        <a class="work-card-link" href="{{ url('/projects/' . $project->id) }}">View project →</a>
                    </div>
                </article>
            @empty
                <p class="hero-description">Belum ada project ditambahkan.</p>
            @endforelse
        </div>
    </section>

    <section class="supporting-section" id="about">
        <div class="supporting-grid">
            <div>
                <div class="section-label">03 / About</div>
                <h2>Learning by making.</h2>
                <div class="supporting-sign">— Zahir Muzakkiy</div>
            </div>
            <div>
                @if ($profile && $profile->photo_secondary)
                    <img class="photo-secondary" src="{{ asset('storage/' . $profile->photo_secondary) }}" alt="Tentang {{ $profile->name ?? 'Zahir' }}">
                @endif
                <p class="supporting-copy">{{ $profile->bio ?? 'Halo! Saya sedang belajar web development menggunakan Laravel. Saya suka membuat sesuatu dari ide sederhana, lalu memperbaikinya sedikit demi sedikit.' }}</p>
            </div>
        </div>
    </section>

    <section class="supporting-section" id="skills">
        <div class="supporting-grid">
            <div>
                <div class="section-label">04 / Skills</div>
                <h2>Tools I use.</h2>
                <p class="supporting-copy">Skill yang sedang saya pelajari untuk membuat solusi digital yang berguna.</p>
            </div>
            <div class="skill-list">
                @forelse ($skills as $skill)
                    <div class="skill-item">
                        <div class="skill-item-top">
                            <span style="color: var(--ink); font: 700 .95rem 'DM Sans', sans-serif; letter-spacing: 0; text-transform: none;">{{ $skill->name }}</span>
                            <span>{{ $skill->obtained_at ? \Carbon\Carbon::parse($skill->obtained_at)->format('Y') : 'learning' }}</span>
                        </div>
                        @if ($skill->description)<p>{{ $skill->description }}</p>@endif
                        @if ($skill->certificate)
                            @php $ext = strtolower(pathinfo($skill->certificate, PATHINFO_EXTENSION)); @endphp
                            <button type="button" class="certificate-link" onclick="openCertModal('{{ asset('storage/' . $skill->certificate) }}', '{{ $ext }}')">Lihat sertifikat ↗</button>
                        @endif
                    </div>
                @empty
                    <p class="hero-description">Belum ada skill ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="supporting-section" id="contact">
        <div class="contact-grid">
            <div>
                <div class="section-label">05 / Contact</div>
                <h2>Let's build something.</h2>
                <p>Punya ide, tawaran project, atau sekadar mau menyapa? Ceritakan saja dari mana kita mulai.</p>
                @if ($contactInfo && $contactInfo->email)
                    <a class="contact-email" href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a>
                @endif
            </div>
            <div>
                @if (session('success'))<p class="success-message">{{ session('success') }}</p>@endif
                <form class="contact-form" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nama Anda" required>
                    <input type="email" name="email" placeholder="Email Anda" required>
                    <textarea name="message" placeholder="Pesan Anda..." required></textarea>
                    <button class="editorial-button primary" type="submit">Kirim pesan <span>↗</span></button>
                </form>
            </div>
        </div>
    </section>

    <footer class="editorial-footer">✳ Made with purpose · Designed & built by Zay · © {{ date('Y') }}</footer>
</div>

<div id="certModal" class="modal-backdrop" onclick="if (event.target === this) closeCertModal()">
    <div class="modal-card">
        <button class="modal-close" type="button" onclick="closeCertModal()">&times;</button>
        <div id="certModalContent"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openCertModal(url, type) {
        const modal = document.getElementById('certModal');
        const content = document.getElementById('certModalContent');
        content.innerHTML = type === 'pdf'
            ? '<iframe src="' + url + '" style="width:100%;height:70vh;border:0;"></iframe>'
            : '<img src="' + url + '" alt="Sertifikat" style="display:block;max-width:100%;max-height:70vh;margin:0 auto;">';
        modal.classList.add('is-open');
    }

    function closeCertModal() {
        document.getElementById('certModal').classList.remove('is-open');
        document.getElementById('certModalContent').innerHTML = '';
    }

    document.querySelectorAll('[data-tilt-card]').forEach((card) => {
        card.addEventListener('pointermove', (event) => {
            const rect = card.getBoundingClientRect();
            card.style.setProperty('--rx', ((.5 - (event.clientY - rect.top) / rect.height) * 7).toFixed(2) + 'deg');
            card.style.setProperty('--ry', (((event.clientX - rect.left) / rect.width - .5) * 7).toFixed(2) + 'deg');
        });
        card.addEventListener('pointerleave', () => {
            card.style.setProperty('--rx', '0deg');
            card.style.setProperty('--ry', '0deg');
        });
    });

    const heroRoleText = document.getElementById('heroRoleText');
    if (heroRoleText) {
        const roles = ['currently learning Laravel', 'building with curiosity', 'open for good ideas'];
        let roleIndex = 0;
        setInterval(() => {
            roleIndex = (roleIndex + 1) % roles.length;
            heroRoleText.style.opacity = '0';
            setTimeout(() => {
                heroRoleText.textContent = roles[roleIndex];
                heroRoleText.style.opacity = '1';
            }, 160);
        }, 2600);
    }
</script>
@endpush
