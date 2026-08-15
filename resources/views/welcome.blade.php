@extends('layouts.public')

@section('title', ($profile->name ?? 'Portfolio Saya') . ' - Portfolio')

@section('content')

    <section id="home" class="section">
        <div class="card hero-card">
            @if ($profile && $profile->photo)
                <img src="{{ asset('storage/' . $profile->photo) }}" class="hero-photo" alt="Foto profil">
            @endif
            <h1 class="hero-title">Halo, Saya {{ $profile->name ?? 'Zahir' }} 👋</h1>
            <p class="hero-subtitle">{{ $profile->title ?? 'Web Developer Enthusiast | Belajar Laravel' }}</p>
        </div>
    </section>

    <section id="about" class="section">
        <div class="card">
            <h2>Tentang Saya</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>{{ $profile->bio ?? 'Halo! Saya sedang belajar web development menggunakan Laravel.' }}</p>
                </div>
                @if ($profile && $profile->photo_secondary)
                    <div class="about-photo-wrap">
                        <img src="{{ asset('storage/' . $profile->photo_secondary) }}" class="about-photo" alt="Foto tambahan">
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id="skills" class="section">
        <div class="card">
            <h2>Skills / Keahlian</h2>

            @forelse ($skills as $skill)
                <div class="skill-item">
                    <strong>{{ $skill->name }}</strong>
                    @if ($skill->description)
                        <p class="skill-desc">{{ $skill->description }}</p>
                    @endif
                    @if ($skill->obtained_at)
                        <small class="skill-date">Diperoleh: {{ \Carbon\Carbon::parse($skill->obtained_at)->format('d M Y') }}</small>
                    @endif
                    @if ($skill->certificate)
                        @php
                            $ext = strtolower(pathinfo($skill->certificate, PATHINFO_EXTENSION));
                        @endphp
                        <br>
                        <button type="button" class="skill-cert-btn" onclick="openCertModal('{{ asset('storage/' . $skill->certificate) }}', '{{ $ext }}')">
                            Lihat Sertifikat
                        </button>
                    @endif
                </div>
            @empty
                <p class="empty-text">Belum ada skill ditambahkan.</p>
            @endforelse
        </div>
    </section>

    <section id="projects" class="section">
        <h2>Daftar Project Terbaru</h2>

        @foreach ($projects as $project)
            <div class="card project-card">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" class="project-image" alt="{{ $project->title }}">
                @endif

                <h3 class="project-title">{{ $project->title }}</h3>
                <p>{{ Str::limit($project->description, 100) }}</p>

                <a href="{{ url('/projects/' . $project->id) }}" class="project-link">
                    View Detail &rarr;
                </a>
            </div>
        @endforeach

        <div class="projects-cta">
            <a href="{{ url('/all-projects') }}" class="btn btn-primary btn-wide">
                View All Projects &rarr;
            </a>
        </div>
    </section>

    <section id="contact" class="section">
        <div class="card">
            <h2>Hubungi Saya ✉️</h2>
            <p class="contact-desc">
                Punya pertanyaan, tawaran project, atau sekadar mau menyapa? Silakan hubungi saya!
            </p>

            <div class="contact-grid">

                <div class="contact-info">
                    <h3 class="contact-heading">Detail Informasi</h3>

                    @if ($contactInfo && $contactInfo->email)
                        <p><strong>Email:</strong><br>
                        <a href="mailto:{{ $contactInfo->email }}" class="contact-link">{{ $contactInfo->email }}</a></p>
                    @endif

                    @if ($contactInfo && $contactInfo->whatsapp)
                        <p><strong>WhatsApp:</strong><br>
                        <a href="https://wa.me/{{ $contactInfo->whatsapp }}" target="_blank" class="contact-link">{{ $contactInfo->whatsapp }}</a></p>
                    @endif

                    <p>
                        <strong>Media Sosial:</strong><br>
                        <span class="social-links">
                            @if ($contactInfo && $contactInfo->github)
                                <a href="{{ $contactInfo->github }}" target="_blank">GitHub</a>
                            @endif
                            @if ($contactInfo && $contactInfo->linkedin)
                                <a href="{{ $contactInfo->linkedin }}" target="_blank">LinkedIn</a>
                            @endif
                            @if ($contactInfo && $contactInfo->instagram)
                                <a href="{{ $contactInfo->instagram }}" target="_blank">Instagram</a>
                            @endif
                        </span>
                    </p>
                </div>

                <div class="contact-form-wrap">
                    <h3 class="contact-heading">Kirim Pesan</h3>

                    @if (session('success'))
                        <p class="form-success">{{ session('success') }}</p>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Nama Anda" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email Anda" required class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Pesan Anda..." rows="4" required class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <div id="certModal" class="cert-modal">
        <div class="cert-modal-content">
            <button onclick="closeCertModal()" class="cert-modal-close">&times;</button>
            <div id="certModalContent" class="cert-modal-body"></div>
        </div>
    </div>

@endsection