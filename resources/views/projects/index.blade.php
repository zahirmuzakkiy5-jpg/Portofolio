@extends('layouts.public')

@section('title', 'All Projects — Portfolio')

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
    }

    body { background: var(--paper); color: var(--ink); }
    .site-header { background: rgba(244, 243, 238, .96) !important; border-color: var(--ink) !important; }
    .site-brand, .site-nav a { color: var(--ink) !important; }
    .site-brand span, .site-nav a:hover { color: var(--red) !important; }
    .header-contact { background: var(--ink) !important; }
    .header-contact:hover { background: var(--red) !important; }

    .archive-page { width: min(1450px, 100%); margin: 0 auto; padding: 0 4vw 35px; }
    .archive-hero { display: grid; grid-template-columns: .7fr 1.3fr; gap: 65px; padding: 80px 0 46px; border-bottom: 1px solid var(--ink); }
    .archive-kicker { color: var(--red); font: .7rem 'DM Mono', monospace; letter-spacing: .12em; text-transform: uppercase; }
    .archive-title { max-width: 410px; margin: 24px 0; font: 800 clamp(4.2rem, 9vw, 9.4rem)/.78 'DM Sans', sans-serif; letter-spacing: -.1em; text-transform: uppercase; }
    .archive-title .red { color: var(--red); }
    .archive-intro { max-width: 350px; color: var(--muted); font-size: .9rem; line-height: 1.75; }
    .archive-note { margin-top: 46px; padding-top: 17px; border-top: 1px solid var(--line); color: var(--muted); font: italic .82rem/1.6 'Playfair Display', serif; }
    .archive-note::before { content: '“'; display: block; color: var(--red); font: 2rem 'Playfair Display', serif; }

    .archive-summary { display: flex; justify-content: space-between; align-items: start; padding-top: 4px; color: var(--muted); font: .68rem/1.5 'DM Mono', monospace; text-transform: uppercase; }
    .archive-summary strong { display: block; margin-top: 5px; color: var(--red); font: italic 1.8rem 'Playfair Display', serif; text-transform: none; }
    .archive-instruction { color: var(--red); text-align: right; }
    .archive-instruction::after { content: ' →'; color: var(--ink); }

    .archive-body { display: grid; grid-template-columns: 185px minmax(0, 1fr); gap: 30px; padding-top: 35px; }
    .archive-sidebar { align-self: start; position: sticky; top: 105px; }
    .sidebar-heading { margin-bottom: 15px; color: var(--red); font: .65rem 'DM Mono', monospace; letter-spacing: .1em; text-transform: uppercase; }
    .sidebar-item { display: flex; justify-content: space-between; gap: 12px; padding: 8px 0; color: var(--muted); border-bottom: 1px solid var(--line); font: .68rem 'DM Mono', monospace; }
    .sidebar-item:first-of-type { color: var(--ink); }
    .sidebar-quote { margin-top: 95px; color: var(--muted); font: italic .8rem/1.6 'Playfair Display', serif; }
    .sidebar-quote span { display: block; margin-top: 14px; color: var(--red); font-style: normal; }

    .archive-track-wrap { position: relative; overflow: hidden; }
    .archive-track { display: grid; grid-template-columns: repeat(12, minmax(220px, 1fr)); gap: 16px; }
    .archive-card { position: relative; min-height: 285px; display: flex; flex-direction: column; background: var(--white); border: 1px solid var(--ink); transition: transform .2s ease, box-shadow .2s ease; }
    .archive-card:nth-child(3n + 1) { grid-column: span 2; }
    .archive-card:nth-child(3n + 2) { grid-column: span 2; }
    .archive-card:nth-child(3n) { grid-column: span 2; }
    .archive-card:hover { transform: translateY(-5px) rotate(-.35deg); box-shadow: 9px 9px 0 rgba(17, 17, 17, .1); }
    .archive-number { display: flex; justify-content: space-between; padding: 11px 13px; border-bottom: 1px solid var(--line); color: var(--red); font: .68rem 'DM Mono', monospace; }
    .archive-image, .archive-image-empty { display: block; width: 100%; height: 160px; object-fit: cover; filter: grayscale(1); border-bottom: 1px solid var(--ink); }
    .archive-image-empty { display: grid; place-items: center; color: var(--muted); background: var(--paper-alt); font: italic 2rem 'Playfair Display', serif; }
    .archive-card-content { flex: 1; display: flex; flex-direction: column; padding: 13px; }
    .archive-card h2 { margin: 0 0 7px; font: 700 1.15rem/1 'Playfair Display', serif; }
    .archive-card p { margin: 0; color: var(--muted); font-size: .75rem; line-height: 1.55; }
    .archive-tech { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 12px; }
    .archive-tech span { padding: 3px 6px; color: var(--ink); border: 1px solid var(--line); font: .58rem 'DM Mono', monospace; }
    .archive-link { display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 15px; color: var(--red); font: .67rem 'DM Mono', monospace; text-decoration: none; text-transform: uppercase; }
    .archive-link:hover { color: var(--ink); }

    .archive-cta { display: flex; align-items: center; justify-content: space-between; min-height: 180px; margin-top: 35px; padding: 30px; border: 1px solid var(--ink); background: var(--paper-alt); }
    .archive-cta h2 { max-width: 350px; margin: 0; font: 700 clamp(1.7rem, 4vw, 3rem)/.95 'Playfair Display', serif; }
    .archive-cta p { max-width: 240px; color: var(--muted); font-size: .8rem; line-height: 1.6; }
    .archive-cta a { padding: 12px 15px; background: var(--ink); color: var(--white); font: .68rem 'DM Mono', monospace; text-decoration: none; text-transform: uppercase; }
    .archive-cta a:hover { background: var(--red); }

    .archive-footer { display: flex; justify-content: space-between; padding-top: 28px; color: var(--muted); font: .64rem 'DM Mono', monospace; }

    @media (max-width: 900px) {
        .archive-hero { grid-template-columns: 1fr; gap: 22px; }
        .archive-title { max-width: 620px; }
        .archive-body { grid-template-columns: 1fr; }
        .archive-sidebar { position: static; display: flex; flex-wrap: wrap; gap: 8px 18px; }
        .sidebar-heading, .sidebar-quote { width: 100%; }
        .sidebar-quote { margin-top: 20px; }
        .sidebar-item { min-width: 140px; border: 0; }
        .archive-track { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: 12px; cursor: grab; }
        .archive-track.is-dragging { cursor: grabbing; user-select: none; }
        .archive-card { min-width: min(80vw, 340px); scroll-snap-align: start; }
    }

    @media (max-width: 560px) {
        .archive-page { padding: 0 20px 25px; }
        .archive-hero { padding-top: 55px; }
        .archive-title { font-size: clamp(3.8rem, 18vw, 6.5rem); }
        .archive-summary, .archive-cta, .archive-footer { align-items: flex-start; flex-direction: column; gap: 20px; }
        .archive-cta { padding: 22px; }
    }
</style>
@endpush

@section('content')
<div class="archive-page">
    <section class="archive-hero">
        <div>
            <div class="archive-kicker">Projects / Archive</div>
            <h1 class="archive-title"><span class="red">All</span><br>Projects</h1>
            <p class="archive-intro">Kumpulan karya, eksperimen digital, dan project web yang saya bangun dengan fokus pada pengalaman pengguna dan performa.</p>
            <div class="archive-note">Setiap project lahir dari masalah nyata, rasa ingin tahu, dan proses yang terus tumbuh.<span>— Zay</span></div>
        </div>
        <div>
            <div class="archive-summary">
                <div>Total project<strong>{{ $projects->count() }}+</strong></div>
                <div class="archive-instruction">Geser untuk lihat semuanya</div>
            </div>
        </div>
    </section>

    <section class="archive-body">
        <aside class="archive-sidebar">
            <div class="sidebar-heading">Project index</div>
            <div class="sidebar-item"><span>Semua project</span><span>{{ $projects->count() }}</span></div>
            <div class="sidebar-item"><span>Terbaru</span><span>01</span></div>
            <div class="sidebar-item"><span>Eksperimen</span><span>↗</span></div>
            <div class="sidebar-quote">A small archive of things I made while learning.<span>— Zay</span></div>
        </aside>

        <div class="archive-track-wrap">
            <div class="archive-track" data-archive-track>
                @forelse ($projects as $project)
                    <article class="archive-card">
                        <div class="archive-number"><span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><span>{{ $project->is_featured ? 'Selected' : 'Project' }}</span></div>
                        @if ($project->image)
                            <img class="archive-image" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                        @else
                            <div class="archive-image-empty">No. {{ $loop->iteration }}</div>
                        @endif
                        <div class="archive-card-content">
                            <h2>{{ $project->title }}</h2>
                            <p>{{ \Illuminate\Support\Str::limit($project->description, 115) }}</p>
                            @if ($project->tech_stack)
                                <div class="archive-tech">
                                    @foreach (explode(',', $project->tech_stack) as $tech)
                                        @if (trim($tech) !== '')<span>{{ trim($tech) }}</span>@endif
                                    @endforeach
                                </div>
                            @endif
                            <a class="archive-link" href="{{ url('/projects/' . $project->id) }}"><span>Lihat project</span><span>→</span></a>
                        </div>
                    </article>
                @empty
                    <p class="archive-intro">Belum ada project yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="archive-cta">
        <div>
            <div class="archive-kicker">More to come</div>
            <h2>Tertarik membangun sesuatu bersama?</h2>
        </div>
        <p>Kalau kamu punya ide atau project yang ingin dibuat, mari mulai dari percakapan kecil.</p>
        <a href="{{ url('/') }}#contact">Kontak saya ↗</a>
    </section>

    <footer class="archive-footer"><span>✳ Made with purpose · Designed & built by Zay</span><a href="{{ url('/') }}" style="color: var(--red); text-decoration: none;">Back to top ↑</a></footer>
</div>
@endsection

@push('scripts')
<script>
    const archiveTrack = document.querySelector('[data-archive-track]');
    if (archiveTrack) {
        let isDown = false;
        let startX = 0;
        let startScroll = 0;
        archiveTrack.addEventListener('pointerdown', (event) => {
            if (window.innerWidth > 900) return;
            isDown = true;
            startX = event.clientX;
            startScroll = archiveTrack.scrollLeft;
            archiveTrack.classList.add('is-dragging');
            archiveTrack.setPointerCapture(event.pointerId);
        });
        archiveTrack.addEventListener('pointermove', (event) => {
            if (!isDown) return;
            archiveTrack.scrollLeft = startScroll - (event.clientX - startX);
        });
        archiveTrack.addEventListener('pointerup', () => {
            isDown = false;
            archiveTrack.classList.remove('is-dragging');
        });
        archiveTrack.addEventListener('pointercancel', () => {
            isDown = false;
            archiveTrack.classList.remove('is-dragging');
        });
    }
</script>
@endpush
