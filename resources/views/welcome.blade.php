@extends('Layouts.public')

@section('title', ($profile->name ?? 'Zahir Muzakkiy') . ' — Portfolio')

@php
    $portfolioProjects = $projects->values()->map(function ($project, $index) {
        $fallbacks = [
            'linear-gradient(140deg,#111 0 42%,#2f3b3e 43% 58%,#c7c5bd 59%)',
            'linear-gradient(135deg,#c8c5ba 0 35%,#16191b 36% 65%,#747a78 66%)',
            'linear-gradient(90deg,#1a1d20 0 28%,#ddd9d0 29% 68%,#9b9d98 69%)',
        ];
        $visual = $fallbacks[$index % count($fallbacks)];

        if ($project->image) {
            $visual = "url('" . asset('storage/' . $project->image) . "') center / cover no-repeat, " . $visual;
        }

        return [
            'no' => str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT),
            'type' => $project->tech_stack ? strtoupper(str_replace(',', ' / ', $project->tech_stack)) : 'WEB / PROJECT',
            'title' => $project->title,
            'copy' => $project->description ?? '',
            'visual' => $visual,
            'url' => url('/projects/' . $project->id),
        ];
    });
    $nameParts = preg_split('/\s+/', trim($profile->name ?? 'Zahir Muzakkiy'));
    $firstName = $nameParts[0] ?? 'Zahir';
    $lastName = implode(' ', array_slice($nameParts, 1)) ?: 'Muzakkiy';
@endphp

@push('head')
<style>
    .skip-link{position:fixed;left:12px;top:12px;z-index:200;padding:8px 11px;color:var(--bg);background:var(--bone);font:500 .65rem 'DM Mono';transform:translateY(-150%);transition:transform .2s}.skip-link:focus{transform:none}
    .modal-backdrop{display:none;position:fixed;inset:0;z-index:100;align-items:center;justify-content:center;padding:24px;background:rgba(0,0,0,.82)}.modal-backdrop.is-open{display:flex}.modal-card{position:relative;width:min(760px,100%);max-height:90vh;overflow:auto;padding:22px;background:var(--panel);border:1px solid var(--line);clip-path:polygon(0 2%,98% 0,100% 96%,2% 100%)}.modal-close{position:absolute;top:10px;right:10px;width:34px;height:34px;color:var(--bone);background:var(--red);border:0;cursor:pointer;font-size:1.2rem}.certificate-link{display:inline-block;margin-top:11px;color:var(--red);background:none;border:0;cursor:pointer;font:500 .63rem 'DM Mono';text-decoration:underline}.certificate-link:hover{color:var(--cyan)}
</style>
@endpush

@section('content')
<div class="page" id="home">
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero-copy">
            <div class="kicker"><b>01</b> / INTRO {{ date('Y') }}</div>
            <h1 class="hero-title" id="hero-title"><span>{{ $firstName }}</span><br><span class="accent">{{ $lastName }}</span><small>{{ $profile->title ?? 'Web Developer' }}</small></h1>
            <div class="rule"></div>
            <p class="intro">{{ $profile->bio ?? 'I design and develop digital experiences that are simple, fast, and impactful.' }}</p>
            <div class="meta"><div>Based in<strong>Indonesia</strong></div><div>Focus<strong>Web development</strong></div><div>Available<strong>For freelance</strong></div></div>
            <div class="actions"><a class="action red" href="#projects">View selected work →</a><a class="action" href="#contact">Let's build ↗</a></div>
        </div>
        <div class="hero-art">
            <div class="person">
                <span class="feet-glow" aria-hidden="true"></span>
                @if ($profile && $profile->photo)
                    <div class="person-silhouette" style="display:none"></div>
                    <img class="user-photo" id="userPhoto" src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->name ?? 'Zahir' }} full-body portrait" style="display:block">
                    <img class="user-photo-ghost" id="userPhotoGhost" src="{{ asset('storage/' . $profile->photo) }}" alt="" aria-hidden="true" style="display:block">
                @else
                    <div class="person-silhouette" aria-label="Foto full-body belum diupload"></div>
                    <img class="user-photo" id="userPhoto" alt="Your full-body cutout">
                    <img class="user-photo-ghost" id="userPhotoGhost" alt="" aria-hidden="true">
                @endif
                <span class="person-note">Think<br>create<br>solve</span>
            </div>
        </div>
    </section>

    <section class="holo-section reveal" id="projects" aria-labelledby="projects-title">
        <div class="section-head"><div><div class="section-label">02 / Selected work</div><h2 id="projects-title">Projects in motion.</h2></div><div class="section-head-tools"><span class="section-label">Swipe / drag</span><a href="{{ url('/all-projects') }}">All projects →</a></div></div>
        <div class="holo-shell"><div class="holo-track" id="holoTrack"></div><div class="holo-controls"><button id="prev" type="button" aria-label="Previous project">←</button><button id="next" type="button" aria-label="Next project">→</button></div><div class="holo-dots" id="holoDots" aria-label="Project position"></div></div>
    </section>

    <section class="about reveal" id="about" aria-labelledby="about-title">
        <div><div class="section-label">03 / About</div><h2 id="about-title">Built with <span class="morph-word" id="morphWord">curiosity</span>.</h2><div class="signature">— {{ $profile->name ?? 'Zay' }}</div></div>
        <div>
            <div class="about-visual">
                <div class="code-editor"><div class="code-lines"><span class="code-line">01  const creator = {</span><span class="code-line">02    name: <b>{{ $profile->name ?? 'Zahir' }}</b>,</span><span class="code-line">03    mode: <b>learning</b>,</span><span class="code-line">04    craft: <b>web experiences</b>,</span><span class="code-line">05    motion: <b>true</b>,</span><span class="code-line">06    idea: <b>make it real</b>,</span><span class="code-line">07  };</span><span class="code-line">08  creator.build()<span class="code-caret" aria-hidden="true"></span></span></div></div>
                @if ($profile && $profile->photo_secondary)
                    <div class="about-figure" style="display:none"></div>
                    <img class="about-photo" id="aboutPhoto" src="{{ asset('storage/' . $profile->photo_secondary) }}" alt="Tentang {{ $profile->name ?? 'Zahir' }}" style="display:block">
                @else
                    <div class="about-figure" aria-label="Foto About belum diupload"></div>
                    <img class="about-photo" id="aboutPhoto" alt="Your About cutout">
                @endif
            </div>
            <p class="copy">{{ $profile->bio ?? 'Saya percaya website yang baik tidak harus ramai. Ia harus terasa jelas, punya karakter, dan membantu orang melakukan sesuatu dengan lebih mudah. Di sini saya belajar dengan cara membuat.' }}</p>
            <p class="copy">Setiap project adalah catatan kecil dari proses belajar, eksperimen, dan keberanian untuk mencoba lagi.</p>
        </div>
    </section>

    <section class="skills reveal" id="skills" aria-labelledby="skills-title">
        <div><div class="section-label">04 / Stack</div><h2 id="skills-title">Tools in progress.</h2><p class="copy">Skill, tools, dan sertifikat yang sedang saya kumpulkan untuk membuat solusi digital yang berguna.</p></div>
        <div><div class="skill-cloud">
            @forelse ($skills as $skill)
                <span class="skill-chip">{{ $skill->name }}@if($skill->description) <small style="display:block;margin-top:5px;color:var(--muted);font-size:.56rem">{{ $skill->description }}</small>@endif</span>
            @empty
                <span class="skill-chip">Laravel / PHP</span><span class="skill-chip">HTML / CSS</span><span class="skill-chip">JavaScript</span><span class="skill-chip">Git / GitHub</span>
            @endforelse
        </div>
        @foreach ($skills as $skill)
            @if ($skill->certificate)
                @php $extension = strtolower(pathinfo($skill->certificate, PATHINFO_EXTENSION)); @endphp
                <button type="button" class="certificate-link" onclick="openCertModal('{{ asset('storage/' . $skill->certificate) }}', '{{ $extension }}')">Lihat sertifikat {{ $skill->name }} ↗</button>
            @endif
        @endforeach
        </div>
    </section>

    <section class="contact reveal" id="contact" aria-labelledby="contact-title">
        <div><div class="contact-orbit" aria-hidden="true"><span class="orbit-ball"></span><span class="orbit-ball two"></span><span class="orbit-ball three"></span></div><div class="section-label">05 / Contact</div><h2 id="contact-title">Let's make it real.</h2><p class="copy">Punya ide, project, atau masalah yang ingin dibuat lebih sederhana? Kirim pesan atau temukan saya di sini.</p><div class="contact-command" aria-live="polite"><span class="prompt">&gt;</span><span id="contactType" class="command-text">send good ideas</span><span class="command-cursor" aria-hidden="true"></span></div><div class="contact-list">
            @if ($contactInfo?->instagram)<a class="social" href="{{ $contactInfo->instagram }}" target="_blank" rel="noreferrer">Instagram ↗</a>@endif
            @if ($contactInfo?->linkedin)<a class="social" href="{{ $contactInfo->linkedin }}" target="_blank" rel="noreferrer">LinkedIn ↗</a>@endif
            @if ($contactInfo?->github)<a class="social" href="{{ $contactInfo->github }}" target="_blank" rel="noreferrer">GitHub ↗</a>@endif
            @if ($contactInfo?->whatsapp)<a class="social" href="https://wa.me/{{ preg_replace('/\D+/', '', $contactInfo->whatsapp) }}" target="_blank" rel="noreferrer">WhatsApp ↗</a>@endif
        </div>@if ($contactInfo?->email)<a class="social" href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a>@endif</div>
        <div><form class="contact-form" action="{{ route('contact.store') }}" method="POST"><span class="form-label">// type your message</span>@csrf<input name="name" placeholder="Your name" required><input name="email" type="email" placeholder="Your email" required><textarea name="message" placeholder="Tell me about it..." required></textarea><button class="action red" type="submit">Send message ↗</button></form>@if(session('success'))<p class="success-message">{{ session('success') }}</p>@endif</div>
    </section>

    <footer><span class="footer-copy"><span class="footer-pulse" aria-hidden="true"></span> ZAY / DARK EDITORIAL · Designed & built by {{ $profile->name ?? 'Zay' }} · © {{ date('Y') }}</span></footer>
</div>

<div id="certModal" class="modal-backdrop" onclick="if (event.target === this) closeCertModal()"><div class="modal-card"><button class="modal-close" type="button" onclick="closeCertModal()" aria-label="Close certificate">&times;</button><div id="certModalContent"></div></div></div>
@endsection

@push('scripts')
<script>
    window.portfolioProjects = @json($portfolioProjects);
</script>
@endpush
