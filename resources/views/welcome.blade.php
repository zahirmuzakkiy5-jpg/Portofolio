@extends('layouts.public')

@section('title', ($profile->name ?? 'Portfolio Saya') . ' - Portfolio')

@section('content')

    <section id="home" style="padding-top: 20px; margin-bottom: 40px;">
        <div class="card" style="text-align: center; padding: 40px 20px;">
            @if ($profile && $profile->photo)
                <img src="{{ asset('storage/' . $profile->photo) }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; margin-bottom: 15px;">
            @endif
            <h1 style="margin-bottom: 10px;">Halo, Saya {{ $profile->name ?? 'Zahir' }} 👋</h1>
            <p style="font-size: 1.1rem; color: #555;">{{ $profile->title ?? 'Web Developer Enthusiast | Belajar Laravel' }}</p>
        </div>
    </section>

    <section id="about" style="padding-top: 20px; margin-bottom: 40px;">
        <div class="card">
            <h2>Tentang Saya</h2>
            <div style="display: flex; gap: 20px; flex-wrap: wrap; align-items: flex-start;">
                <div style="flex: 1; min-width: 250px;">
                    <p>{{ $profile->bio ?? 'Halo! Saya sedang belajar web development menggunakan Laravel.' }}</p>
                </div>
                @if ($profile && $profile->photo_secondary)
                    <div style="flex-shrink: 0;">
                        <img src="{{ asset('storage/' . $profile->photo_secondary) }}" style="width: 180px; border-radius: 8px; object-fit: cover;">
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id="skills" style="padding-top: 20px; margin-bottom: 40px;">
        <div class="card">
            <h2>Skills / Keahlian</h2>

            @forelse ($skills as $skill)
                <div style="border-bottom: 1px solid #eee; padding: 12px 0;">
                    <strong>{{ $skill->name }}</strong>
                    @if ($skill->description)
                        <p style="color: #666; font-size: 0.9rem; margin: 5px 0;">{{ $skill->description }}</p>
                    @endif
                    @if ($skill->obtained_at)
                        <small style="color: #999;">Diperoleh: {{ \Carbon\Carbon::parse($skill->obtained_at)->format('d M Y') }}</small>
                    @endif
                    @if ($skill->certificate)
                        @php
                            $ext = strtolower(pathinfo($skill->certificate, PATHINFO_EXTENSION));
                        @endphp
                        <br><button type="button" onclick="openCertModal('{{ asset('storage/' . $skill->certificate) }}', '{{ $ext }}')" style="background:none; border:none; color:#007bff; text-decoration:underline; cursor:pointer; padding:0; font-size:0.9rem;">Lihat Sertifikat</button>
                    @endif
                </div>
            @empty
                <p style="color: #999;">Belum ada skill ditambahkan.</p>
            @endforelse
        </div>
    </section>

    <section id="projects" style="padding-top: 20px; margin-bottom: 40px;">
        <h2>Daftar Project Terbaru</h2>

        @foreach ($projects as $project)
            <div class="card" style="margin-bottom: 15px;">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
                @endif

                <h3 style="margin-top: 0; color: #007bff;">{{ $project->title }}</h3>
                <p>{{ Str::limit($project->description, 100) }}</p>

                <a href="{{ url('/projects/' . $project->id) }}" style="display: inline-block; margin-top: 10px; color: #007bff; text-decoration: none; font-weight: bold;">
                    View Detail &rarr;
                </a>
            </div>
        @endforeach

        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ url('/all-projects') }}" style="display: inline-block; padding: 10px 25px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
                View All Projects &rarr;
            </a>
        </div>
    </section>

    <section id="contact" style="padding-top: 20px; margin-bottom: 40px;">
        <div class="card">
            <h2>Hubungi Saya ✉️</h2>
            <p style="color: #666; margin-bottom: 20px;">
                Punya pertanyaan, tawaran project, atau sekadar mau menyapa? Silakan hubungi saya!
            </p>

            <div style="display: flex; gap: 30px; flex-wrap: wrap;">

                <div style="flex: 1; min-width: 250px;">
                    <h3 style="color: #007bff; margin-top: 0;">Detail Informasi</h3>

                    @if ($contactInfo && $contactInfo->email)
                        <p><strong>Email:</strong><br>
                        <a href="mailto:{{ $contactInfo->email }}" style="color: #333; text-decoration: none;">{{ $contactInfo->email }}</a></p>
                    @endif

                    @if ($contactInfo && $contactInfo->whatsapp)
                        <p><strong>WhatsApp:</strong><br>
                        <a href="https://wa.me/{{ $contactInfo->whatsapp }}" target="_blank" style="color: #333; text-decoration: none;">{{ $contactInfo->whatsapp }}</a></p>
                    @endif

                    <p><strong>Media Sosial:</strong><br>
                        @if ($contactInfo && $contactInfo->github)
                            <a href="{{ $contactInfo->github }}" target="_blank" style="margin-right: 10px; color: #007bff;">GitHub</a>
                        @endif
                        @if ($contactInfo && $contactInfo->linkedin)
                            <a href="{{ $contactInfo->linkedin }}" target="_blank" style="margin-right: 10px; color: #007bff;">LinkedIn</a>
                        @endif
                        @if ($contactInfo && $contactInfo->instagram)
                            <a href="{{ $contactInfo->instagram }}" target="_blank" style="color: #007bff;">Instagram</a>
                        @endif
                    </p>
                </div>

                <div style="flex: 1.5; min-width: 250px;">
                    <h3 style="color: #007bff; margin-top: 0;">Kirim Pesan</h3>

                    @if (session('success'))
                        <p style="color: green; font-weight: bold; margin-bottom: 10px;">{{ session('success') }}</p>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div style="margin-bottom: 10px;">
                            <input type="text" name="name" placeholder="Nama Anda" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <input type="email" name="email" placeholder="Email Anda" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <textarea name="message" placeholder="Pesan Anda..." rows="4" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>
                        <button type="submit" style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <div id="certModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); z-index:1000; align-items:center; justify-content:center;">
        <div style="background:white; padding:20px; border-radius:8px; max-width:90%; max-height:90%; overflow:auto; position:relative;">
            <button onclick="closeCertModal()" style="position:absolute; top:10px; right:10px; background:#dc3545; color:white; border:none; border-radius:50%; width:30px; height:30px; cursor:pointer; font-weight:bold;">&times;</button>
            <div id="certModalContent" style="margin-top:20px;"></div>
        </div>
    </div>

    <script>
        function openCertModal(url, type) {
            const modal = document.getElementById('certModal');
            const content = document.getElementById('certModalContent');
            if (type === 'pdf') {
                content.innerHTML = '<iframe src="' + url + '" style="width:80vw; height:80vh; border:none;"></iframe>';
            } else {
                content.innerHTML = '<img src="' + url + '" style="max-width:80vw; max-height:80vh;">';
            }
            modal.style.display = 'flex';
        }

        function closeCertModal() {
            document.getElementById('certModal').style.display = 'none';
            document.getElementById('certModalContent').innerHTML = '';
        }
    </script>

@endsection