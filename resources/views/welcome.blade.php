@extends('layouts.public')

@section('title', ($profile->name ?? 'Zahir Muzakkiy') . ' — Portfolio')

@push('head')
<style>
    :root {
        --paper: #f7f3ec;
        --paper-deep: #eee7db;
        --ink: #18243a;
        --ink-soft: #455064;
        --navy: #19304f;
        --coral: #d96845;
        --coral-soft: #f0c7b7;
        --line: #d9d0c2;
        --white: #fffdf9;
        --shadow: 0 24px 60px rgba(33, 42, 57, .10);
    }

    * { box-sizing: border-box; }

    html { scroll-behavior: smooth; }

    body {
        margin: 0;
        background: var(--paper);
        color: var(--ink);
        font-family: 'DM Sans', sans-serif;
    }

    body::before {
        content: '';
        position: fixed;
        inset: 0;
        pointer-events: none;
        opacity: .22;
        z-index: -1;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.05'/%3E%3C/svg%3E");
    }

    .site-header {
        background: rgba(247, 243, 236, .92) !important;
        border-bottom: 1px solid var(--line) !important;
        box-shadow: none !important;
    }

    .site-brand { color: var(--navy) !important; }
    .site-brand span { color: var(--coral) !important; }
    .site-nav a { color: var(--ink-soft) !important; }
    .site-nav a:hover, .site-nav a:focus { color: var(--coral) !important; }
    .header-contact { background: var(--navy) !important; color: var(--white) !important; }

    .home-shell {
        max-width: 1220px;
        margin: 0 auto;
        padding: 0 42px 90px;
    }

    .hero {
        min-height: 650px;
        display: grid;
        grid-template-columns: minmax(0, 1.04fr) minmax(360px, .96fr);
        align-items: center;
        gap: 42px;
        padding: 82px 0 70px;
        border-bottom: 1px solid var(--line);
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--coral);
        font: 500 .76rem/1 'DM Mono', monospace;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .eyebrow::before { content: '✳'; font-size: 1.05rem; }

    .hero h1 {
        max-width: 720px;
        margin: 20px 0 22px;
        color: var(--navy);
        font: 700 clamp(3.2rem, 7.5vw, 7.2rem)/.92 'Playfair Display', serif;
        letter-spacing: -.055em;
    }

    .hero h1 em { color: var(--coral); font-style: italic; }

    .hero-copy {
        max-width: 510px;
        color: var(--ink-soft);
        font-size: 1.03rem;
        line-height: 1.8;
    }

    .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 30px; }

    .button {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        min-height: 46px;
        padding: 0 20px;
        border: 1px solid var(--navy);
        border-radius: 2px;
        text-decoration: none;
        font-weight: 700;
        font-size: .88rem;
        transition: transform .2s ease, background .2s ease, color .2s ease;
    }

    .button:hover { transform: translateY(-2px); }
    .button-primary { background: var(--navy); color: var(--white); }
    .button-secondary { color: var(--navy); background: transparent; }
    .button-secondary:hover { background: var(--navy); color: var(--white); }

    .hero-note {
        margin-top: 26px;
        color: #778092;
        font: .72rem/1.6 'DM Mono', monospace;
    }

    .hero-visual {
        position: relative;
        min-height: 530px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .hero-visual::before {
        content: '';
        position: absolute;
        right: 3%;
        bottom: 0;
        width: 86%;
        height: 72%;
        border-radius: 48% 48% 0 0;
        background: var(--coral-soft);
    }

    .hero-visual::after {
        content: 'PORTFOLIO / 2026';
        position: absolute;
        right: 0;
        top: 34px;
        color: var(--coral);
        font: .7rem 'DM Mono', monospace;
        letter-spacing: .15em;
        transform: rotate(90deg) translateX(100%);
        transform-origin: right top;
    }

    .hero-photo {
        position: relative;
        z-index: 1;
        align-self: flex-end;
        width: min(100%, 530px);
        max-height: 600px;
        object-fit: contain;
        object-position: center bottom;
        filter: drop-shadow(18px 18px 0 rgba(25, 48, 79, .08));
    }

    .hero-placeholder {
        position: relative;
        z-index: 1;
        align-self: flex-end;
        width: 330px;
        height: 430px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--navy);
        font: italic 4.4rem 'Playfair Display', serif;
    }

    .floating-label {
        position: absolute;
        z-index: 2;
        left: 0;
        bottom: 36px;
        max-width: 190px;
        padding: 15px 17px;
        color: var(--white);
        background: var(--navy);
        font: .72rem/1.5 'DM Mono', monospace;
    }

    .section-block { padding: 90px 0; border-bottom: 1px solid var(--line); }

    .section-heading { display: grid; grid-template-columns: .8fr 1.2fr; gap: 40px; margin-bottom: 40px; }

    .section-kicker { color: var(--coral); font: .75rem 'DM Mono', monospace; letter-spacing: .13em; text-transform: uppercase; }

    .section-heading h2 {
        margin: 0;
        color: var(--navy);
        font: 700 clamp(2.2rem, 4vw, 4rem)/1 'Playfair Display', serif;
        letter-spacing: -.04em;
    }

    .section-heading p { max-width: 540px; margin: 8px 0 0; color: var(--ink-soft); line-height: 1.75; }

    .about-grid { display: grid; grid-template-columns: .9fr 1.1fr; gap: 52px; align-items: center; }

    .about-photo-wrap { position: relative; min-height: 340px; }
    .about-photo-wrap::before { content: ''; position: absolute; inset: 24px 25px 0 0; background: var(--paper-deep); }
    .about-photo { position: relative; width: 100%; height: 340px; object-fit: cover; filter: saturate(.78); }
    .about-placeholder { position: relative; height: 340px; display: grid; place-items: center; color: var(--coral); font: italic 3.5rem 'Playfair Display', serif; }

    .about-copy { color: var(--ink-soft); font-size: 1.06rem; line-height: 1.9; }
    .about-signature { margin-top: 24px; color: var(--coral); font: italic 1.35rem 'Playfair Display', serif; }

    .skills-list { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); border-top: 1px solid var(--line); }
    .skill-row { padding: 19px 16px 19px 0; border-bottom: 1px solid var(--line); }
    .skill-name { display: flex; justify-content: space-between; gap: 20px; color: var(--navy); font-weight: 700; }
    .skill-name span { color: var(--coral); font: .72rem 'DM Mono', monospace; }
    .skill-description { margin: 8px 0 0; color: var(--ink-soft); font-size: .88rem; line-height: 1.55; }
    .certificate-link { display: inline-block; margin-top: 8px; color: var(--coral); font-size: .8rem; text-decoration: underline; }

    .projects-toolbar { display: flex; justify-content: space-between; align-items: end; gap: 24px; margin-bottom: 28px; }
    .projects-toolbar h2 { margin: 0; color: var(--navy); font: 700 clamp(2rem, 4vw, 3.2rem)/1 'Playfair Display', serif; }
    .projects-toolbar a { color: var(--coral); font-weight: 700; text-decoration: none; }

    .project-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; }
    .project-card { background: var(--white); border: 1px solid var(--line); transition: transform .22s ease, box-shadow .22s ease; }
    .project-card:hover { transform: translateY(-5px); box-shadow: var(--shadow); }
    .project-image, .project-image-placeholder { display: block; width: 100%; height: 190px; object-fit: cover; background: var(--paper-deep); }
    .project-image-placeholder { display: grid; place-items: center; color: var(--coral); font: italic 2.5rem 'Playfair Display', serif; }
    .project-content { padding: 20px; }
    .project-content h3 { margin: 0 0 9px; color: var(--navy); font: 700 1.25rem 'Playfair Display', serif; }
    .project-content p { min-height: 44px; margin: 0 0 14px; color: var(--ink-soft); font-size: .88rem; line-height: 1.55; }
    .project-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 18px; }
    .project-tag { padding: 4px 8px; color: var(--navy); border: 1px solid var(--coral-soft); border-radius: 999px; font: .68rem 'DM Mono', monospace; }
    .project-link { color: var(--coral); font-weight: 700; font-size: .82rem; text-decoration: none; }

    .contact-grid { display: grid; grid-template-columns: .9fr 1.1fr; gap: 52px; align-items: start; }
    .contact-copy { color: var(--ink-soft); line-height: 1.75; }
    .contact-email { display: inline-block; margin-top: 18px; color: var(--navy); font: 600 1rem 'DM Mono', monospace; text-decoration: none; border-bottom: 1px solid var(--coral); }
    .contact-form { display: grid; gap: 12px; }
    .contact-form input, .contact-form textarea { width: 100%; padding: 15px 16px; color: var(--ink); background: var(--white); border: 1px solid var(--line); border-radius: 0; font: .9rem 'DM Sans', sans-serif; }
    .contact-form textarea { min-height: 150px; resize: vertical; }
    .contact-form input:focus, .contact-form textarea:focus { outline: 2px solid var(--coral-soft); border-color: var(--coral); }
    .contact-form button { width: fit-content; cursor: pointer; }
    .success-message { padding: 12px 14px; color: #276a4b; background: #e4f1e8; border-left: 3px solid #4e9c72; }

    .site-footer { padding: 32px 0 0; color: #7c8491; font: .72rem 'DM Mono', monospace; text-align: center; }

    .modal-backdrop { display: none; position: fixed; inset: 0; z-index: 100; align-items: center; justify-content: center; padding: 24px; background: rgba(24, 36, 58, .75); }
    .modal-backdrop.is-open { display: flex; }
    .modal-card { position: relative; width: min(720px, 100%); max-height: 90vh; overflow: auto; padding: 22px; background: var(--paper); }
    .modal-close { position: absolute; top: 12px; right: 12px; width: 34px; height: 34px; cursor: pointer; border: 0; background: var(--coral); color: var(--white); font-size: 1.3rem; }
    #certModalContent { margin-top: 18px; text-align: center; }

    @media (max-width: 850px) {
        .home-shell { padding: 0 24px 60px; }
        .hero { grid-template-columns: 1fr; padding-top: 58px; }
        .hero-visual { min-height: 420px; order: -1; }
        .hero h1 { font-size: clamp(3.2rem, 15vw, 6rem); }
        .section-heading, .about-grid, .contact-grid { grid-template-columns: 1fr; gap: 24px; }
        .project-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    @media (max-width: 560px) {
        .hero-visual { min-height: 360px; }
        .hero-photo { max-height: 390px; }
        .floating-label { left: -8px; bottom: 10px; }
        .skills-list, .project-grid { grid-template-columns: 1fr; }
        .projects-toolbar { align-items: flex-start; flex-direction: column; }
    }
</style>
@endpush

@section('content')
<div class="home-shell">
    <section class="hero" id="home">
        <div class="hero-copy-block">
            <div class="eyebrow">Portfolio / 2026</div>
            <h1>I'm <em>{{ $profile->name ?? 'Zahir Muzakkiy' }}</em>.</h1>
            <p class="hero-copy">
                {{ $profile->bio ?? 'Siswa SMK yang sedang membangun kemampuan web development, satu project kecil demi satu project yang lebih berani.' }}
            </p>

            <div class="hero-actions">
                <a href="#projects" class="button button-primary">Lihat project <span>↗</span></a>
                <a href="#contact" class="button button-secondary">Mari ngobrol</a>
            </div>

            <p class="hero-note">Currently learning Laravel · open for internship / freelance</p>
        </div>

        <div class="hero-visual">
            @if ($profile && $profile->photo)
                <img class="hero-photo" src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->name ?? 'Profile photo' }}">
            @else
                <div class="hero-placeholder">your<br>portrait</div>
            @endif
            <div class="floating-label">A curious developer with a notebook full of ideas.</div>
        </div>
    </section>

    <section class="section-block" id="about">
        <div class="section-heading">
            <div class="section-kicker">01 / Tentang saya</div>
            <div>
                <h2>Belajar dengan membuat.</h2>
                <p>Bukan sekadar menulis kode, tetapi memahami alasan di balik setiap halaman dan pengalaman yang dibangun.</p>
            </div>
        </div>

        <div class="about-grid">
            <div class="about-photo-wrap">
                @if ($profile && $profile->photo_secondary)
                    <img class="about-photo" src="{{ asset('storage/' . $profile->photo_secondary) }}" alt="Tentang {{ $profile->name ?? 'Zahir' }}">
                @else
                    <div class="about-placeholder">a little<br>about me</div>
                @endif
            </div>
            <div>
                <p class="about-copy">{{ $profile->bio ?? 'Halo! Saya sedang belajar web development menggunakan Laravel. Saya suka mengubah ide sederhana menjadi halaman yang bisa digunakan, dipahami, dan terus dikembangkan.' }}</p>
                <div class="about-signature">— Zahir Muzakkiy</div>
            </div>
        </div>
    </section>

    <section class="section-block" id="skills">
        <div class="section-heading">
            <div class="section-kicker">02 / Skills</div>
            <div>
                <h2>Tools yang saya gunakan.</h2>
                <p>Setiap skill di sini adalah bagian dari proses belajar yang masih terus berkembang.</p>
            </div>
        </div>

        <div class="skills-list">
            @forelse ($skills as $skill)
                <div class="skill-row">
                    <div class="skill-name">
                        <span style="color: var(--navy); font: 700 1rem 'DM Sans', sans-serif; letter-spacing: 0; text-transform: none;">{{ $skill->name }}</span>
                        <span>{{ $skill->obtained_at ? \Carbon\Carbon::parse($skill->obtained_at)->format('Y') : 'learning' }}</span>
                    </div>
                    @if ($skill->description)
                        <p class="skill-description">{{ $skill->description }}</p>
                    @endif
                    @if ($skill->certificate)
                        @php $ext = strtolower(pathinfo($skill->certificate, PATHINFO_EXTENSION)); @endphp
                        <button type="button" class="certificate-link" onclick="openCertModal('{{ asset('storage/' . $skill->certificate) }}', '{{ $ext }}')">Lihat sertifikat ↗</button>
                    @endif
                </div>
            @empty
                <p class="skill-description">Belum ada skill ditambahkan.</p>
            @endforelse
        </div>
    </section>

    <section class="section-block" id="projects">
        <div class="projects-toolbar">
            <div>
                <div class="section-kicker">03 / Selected work</div>
                <h2>Project terbaru.</h2>
            </div>
            <a href="{{ url('/all-projects') }}">Lihat semua project ↗</a>
        </div>

        <div class="project-grid">
            @forelse ($projects as $project)
                <article class="project-card">
                    @if ($project->image)
                        <img class="project-image" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    @else
                        <div class="project-image-placeholder">project no. {{ $loop->iteration }}</div>
                    @endif
                    <div class="project-content">
                        <h3>{{ $project->title }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>
                        @if ($project->tech_stack)
                            <div class="project-tags">
                                @foreach (explode(',', $project->tech_stack) as $tech)
                                    @if (trim($tech) !== '')
                                        <span class="project-tag">{{ trim($tech) }}</span>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        <a class="project-link" href="{{ url('/projects/' . $project->id) }}">View detail ↗</a>
                    </div>
                </article>
            @empty
                <p class="skill-description">Belum ada project ditambahkan.</p>
            @endforelse
        </div>
    </section>

    <section class="section-block" id="contact">
        <div class="section-heading">
            <div class="section-kicker">04 / Contact</div>
            <div>
                <h2>Let’s make something useful.</h2>
                <p>Punya pertanyaan, tawaran project, atau sekadar mau menyapa? Saya akan senang mendengar kabar dari kamu.</p>
            </div>
        </div>

        <div class="contact-grid">
            <div>
                <p class="contact-copy">Tidak harus langsung punya brief yang sempurna. Ceritakan saja idenya, lalu kita mulai dari sana.</p>
                @if ($contactInfo && $contactInfo->email)
                    <a class="contact-email" href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a>
                @endif
            </div>

            <div>
                @if (session('success'))
                    <p class="success-message">{{ session('success') }}</p>
                @endif
                <form class="contact-form" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nama Anda" required>
                    <input type="email" name="email" placeholder="Email Anda" required>
                    <textarea name="message" placeholder="Ceritakan sedikit tentang idemu..." required></textarea>
                    <button class="button button-primary" type="submit">Kirim pesan <span>↗</span></button>
                </form>
            </div>
        </div>
    </section>

    <footer class="site-footer">© {{ date('Y') }} Zahir Muzakkiy — Built with Laravel.</footer>
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
        const modal = document.getElementById('certModal');
        modal.classList.remove('is-open');
        document.getElementById('certModalContent').innerHTML = '';
    }
</script>
@endpush
