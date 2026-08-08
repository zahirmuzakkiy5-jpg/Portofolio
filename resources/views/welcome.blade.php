@extends('layouts.public')

@section('title', 'Portfolio Saya')

@section('content')

    <section id="home" style="padding-top: 20px; margin-bottom: 40px;">
        <div class="card" style="text-align: center; padding: 40px 20px;">
            <h1 style="margin-bottom: 10px;">Halo, Saya Zahir 👋</h1>
            <p style="font-size: 1.1rem; color: #555;">Web Developer Enthusiast | Belajar Laravel</p>
        </div>
    </section>

    <section id="about" style="padding-top: 20px; margin-bottom: 40px;">
        <div class="card">
            <h2>Tentang Saya</h2>
            <p>Halo! Saya Zahir, sedang belajar web development menggunakan Laravel.</p>
            <p>Project ini dibuat untuk mempelajari alur dasar Laravel mulai dari Migration, Model, Route, hingga Blade Templating.</p>
        </div>
    </section>

    <section id="skills" style="padding-top: 20px; margin-bottom: 40px;">
        <div class="card">
            <h2>Skills / Keahlian</h2>
            <ul>
                <li>PHP & Laravel Framework</li>
                <li>MySQL Database</li>
                <li>HTML & CSS Dasar</li>
                <li>Git & GitHub</li>
            </ul>
        </div>
    </section>

    <section id="projects" style="padding-top: 20px; margin-bottom: 40px;">
        <h2>Daftar Project Terbaru</h2>

        @foreach ($projects as $project)
            <div class="card" style="margin-bottom: 15px;">
                <h3 style="margin-top: 0; color: #007bff;">{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>
                <small style="color: #777;">Dibuat pada: {{ $project->created_at->format('d M Y') }}</small>
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
                    
                    <p><strong>Email:</strong><br>
                    <a href="mailto:zahir@example.com" style="color: #333; text-decoration: none;">zahir@example.com</a></p>
                    
                    <p><strong>Lokasi:</strong><br>
                    Indonesia</p>

                    <p><strong>Media Sosial:</strong><br>
                    <a href="https://github.com" target="_blank" style="margin-right: 10px; color: #007bff;">GitHub</a>
                    <a href="https://linkedin.com" target="_blank" style="color: #007bff;">LinkedIn</a>
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

@endsection