@extends('layouts.public')

@section('title', ($profile->name ?? 'Zahir Muzakkiy') . ' — Portfolio')

@section('content')

<section class="section-wrap" id="home" style="display:grid; grid-template-columns:1.1fr .9fr; align-items:center; gap:40px; padding-top:96px; padding-bottom:110px;">
  <div>
    <div class="eyebrow" style="display:inline-flex; align-items:center; gap:8px; font-family:'JetBrains Mono',monospace; font-size:.78rem; color:var(--blue-2); background:rgba(77,141,255,0.08); border:1px solid var(--border); padding:6px 14px; border-radius:999px; margin-bottom:22px;">
      <span style="width:7px; height:7px; border-radius:50%; background:#4ade80; animation:pulse 2s infinite;"></span> Available for internship / freelance
    </div>

    <h1 style="font-weight:800; font-size:clamp(2.3rem, 4.4vw, 3.4rem); line-height:1.12; letter-spacing:-1px;">
      I'm <span class="grad-text">{{ $profile->name ?? 'Zahir Muzakkiy' }}</span> 👋
    </h1>

    <p style="margin-top:20px; max-width:500px; color:var(--muted); font-size:.98rem; line-height:1.7;">
      @if ($profile && $profile->bio)
          {{ $profile->bio }}
      @else
          You can call me <span style="color:var(--blue-2); font-weight:600;"><span id="typedNick" class="f-mono">Zakkiy</span><span style="width:2px; height:1em; background:var(--blue-2); display:inline-block; margin-left:2px; animation:blink 1s step-end infinite;"></span></span> —
          siswa SMK yang lagi seru-serunya belajar web development, dari nulis Blade template, atur styling dengan Tailwind, sampai ngoprek build process pakai Vite.
      @endif
    </p>

    <div style="margin-top:44px; display:flex; gap:36px;">
      <div><b style="font-family:'Sora',sans-serif; font-size:1.3rem; display:block;">{{ $projects->count() }}+</b><span style="color:var(--muted); font-size:.8rem;">Project dibangun</span></div>
      <div><b style="font-family:'Sora',sans-serif; font-size:1.3rem; display:block;">SMK</b><span style="color:var(--muted); font-size:.8rem;">Jenjang saat ini</span></div>
      <div><b style="font-family:'Sora',sans-serif; font-size:1.3rem; display:block;">Laravel</b><span style="color:var(--muted); font-size:.8rem;">Fokus belajar</span></div>
    </div>
  </div>

  <div style="position:relative;">
    <div style="position:absolute; top:-18px; right:-22px; font-family:'JetBrains Mono',monospace; font-size:.72rem; background:rgba(16,20,29,0.9); border:1px solid var(--border); border-radius:10px; padding:10px 14px; color:var(--blue-2); animation:float 5s ease-in-out infinite;">
      const dev = &#123;<br>&nbsp;&nbsp;role: "Web Dev"<br>&#125;
    </div>

    <div style="background:linear-gradient(180deg, var(--panel-2), var(--panel)); border:1px solid var(--border); border-radius:var(--radius); box-shadow:0 30px 60px -20px rgba(0,0,0,0.6); overflow:hidden;">
      <div style="display:flex; align-items:center; gap:8px; padding:12px 16px; border-bottom:1px solid var(--border); background:rgba(255,255,255,0.02);">
        <div style="width:10px; height:10px; border-radius:50%; background:#ff5f57;"></div>
        <div style="width:10px; height:10px; border-radius:50%; background:#febc2e;"></div>
        <div style="width:10px; height:10px; border-radius:50%; background:#28c840;"></div>
        <div style="margin-left:10px; font-family:'JetBrains Mono',monospace; font-size:.76rem; color:var(--muted);">zahir.dev</div>
      </div>
      <div style="padding:34px 30px 30px; display:flex; flex-direction:column; align-items:center;">
        <div style="width:168px; height:168px; border-radius:50%; padding:3px; background:linear-gradient(135deg, var(--blue), var(--blue-2)); display:flex; align-items:center; justify-content:center;">
          <div style="width:100%; height:100%; border-radius:50%; background:var(--panel); display:flex; align-items:center; justify-content:center; overflow:hidden;">
            @if ($profile && $profile->photo)
              <img src="{{ asset('storage/' . $profile->photo) }}" style="width:100%; height:100%; object-fit:cover;">
            @else
              <div style="font-family:'Sora',sans-serif; font-weight:700; font-size:2.4rem; color:var(--blue-2);">ZM</div>
            @endif
          </div>
        </div>
        <div style="margin-top:20px; display:flex; align-items:center; gap:8px; font-family:'JetBrains Mono',monospace; font-size:.76rem; color:var(--muted); background:rgba(255,255,255,0.03); border:1px solid var(--border); padding:7px 14px; border-radius:999px;">
          <span style="width:6px; height:6px; border-radius:50%; background:#4ade80; animation:pulse 2s infinite;"></span> currently learning Laravel
        </div>
      </div>
    </div>

    <div style="position:absolute; bottom:6px; left:-34px; font-family:'JetBrains Mono',monospace; font-size:.72rem; background:rgba(16,20,29,0.9); border:1px solid var(--border); border-radius:10px; padding:10px 14px; color:var(--blue-2); animation:float 5s ease-in-out infinite .8s;">
      status: <span style="color:#8891a7;">"online"</span>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="section-wrap" id="about">
  <div class="eyebrow-title"># about.md</div>
  <div class="card-dark" style="display:grid; grid-template-columns:2fr 1fr; gap:28px; align-items:center;">
    <div>
      <h2 style="font-size:1.8rem; margin-bottom:12px;">Tentang Saya</h2>
      <p style="color:var(--muted); line-height:1.7;">{{ $profile->bio ?? 'Halo! Saya sedang belajar web development menggunakan Laravel.' }}</p>
    </div>
    @if ($profile && $profile->photo_secondary)
      <img src="{{ asset('storage/' . $profile->photo_secondary) }}" style="width:100%; border-radius:12px; object-fit:cover;">
    @endif
  </div>
</section>

<!-- SKILLS -->
<section class="section-wrap" id="skills">
  <div class="eyebrow-title"># skills.json</div>
  <div class="card-dark">
    <h2 style="font-size:1.8rem; margin-bottom:18px;">Skills / Keahlian</h2>

    @forelse ($skills as $skill)
      <div style="border-bottom:1px solid var(--border); padding:14px 0;">
        <strong style="font-family:'Sora',sans-serif;">{{ $skill->name }}</strong>
        @if ($skill->description)
          <p style="color:var(--muted); font-size:.9rem; margin:5px 0;">{{ $skill->description }}</p>
        @endif
        @if ($skill->obtained_at)
          <small style="color:var(--muted);">Diperoleh: {{ \Carbon\Carbon::parse($skill->obtained_at)->format('d M Y') }}</small>
        @endif
        @if ($skill->certificate)
          @php $ext = strtolower(pathinfo($skill->certificate, PATHINFO_EXTENSION)); @endphp
          <br><button type="button" onclick="openCertModal('{{ asset('storage/' . $skill->certificate) }}', '{{ $ext }}')" style="background:none; border:none; color:var(--blue-2); text-decoration:underline; cursor:pointer; padding:0; font-size:.9rem; margin-top:4px;">Lihat Sertifikat</button>
        @endif
      </div>
    @empty
      <p style="color:var(--muted);">Belum ada skill ditambahkan.</p>
    @endforelse
  </div>
</section>

<!-- PROJECTS -->
<section class="section-wrap" id="projects">
  <div class="eyebrow-title"># projects/</div>
  <h2 style="font-size:1.8rem; margin-bottom:20px;">Daftar Project Terbaru</h2>

  <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px;">
    @foreach ($projects as $project)
      <div class="card-dark" style="padding:0; overflow:hidden;">
        @if ($project->image)
          <img src="{{ asset('storage/' . $project->image) }}" style="width:100%; height:160px; object-fit:cover;">
        @endif
        <div style="padding:20px;">
          <h3 style="font-size:1.1rem; margin-bottom:8px;">{{ $project->title }}</h3>
          <p style="color:var(--muted); font-size:.9rem; margin-bottom:12px;">{{ Str::limit($project->description, 90) }}</p>

          @if ($project->tech_stack)
            <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:12px;">
              @foreach (explode(',', $project->tech_stack) as $tech)
                <span style="font-family:'JetBrains Mono',monospace; font-size:.72rem; background:rgba(77,141,255,0.08); color:var(--blue-2); padding:3px 10px; border-radius:999px; border:1px solid var(--border);">{{ trim($tech) }}</span>
              @endforeach
            </div>
          @endif

          <a href="{{ url('/projects/' . $project->id) }}" style="color:var(--blue-2); text-decoration:none; font-weight:600; font-size:.9rem;">View Detail &rarr;</a>
        </div>
      </div>
    @endforeach
  </div>

  <div style="margin-top:24px;">
    <a href="{{ url('/all-projects') }}" class="btn btn-primary" style="font-family:'Inter',sans-serif; font-weight:600; font-size:.92rem; padding:13px 26px; border-radius:10px; text-decoration:none; display:inline-flex; background:linear-gradient(135deg, var(--blue), #3a6fe0); color:#fff;">
      View All Projects &rarr;
    </a>
  </div>
</section>

<!-- CONTACT -->
<section class="section-wrap" id="contact">
  <div class="eyebrow-title"># contact.send()</div>
  <div class="card-dark" style="display:grid; grid-template-columns:1fr 1.3fr; gap:32px;">
    <div>
      <h2 style="font-size:1.8rem; margin-bottom:10px;">Hubungi Saya</h2>
      <p style="color:var(--muted); margin-bottom:20px; line-height:1.6;">Punya pertanyaan, tawaran project, atau sekadar mau menyapa? Silakan hubungi saya!</p>

      @if ($contactInfo && $contactInfo->email)
        <p style="margin-bottom:10px;"><span style="color:var(--muted); font-size:.85rem;">Email</span><br>
        <a href="mailto:{{ $contactInfo->email }}" style="color:var(--text); text-decoration:none; font-weight:600;">{{ $contactInfo->email }}</a></p>
      @endif

      @if ($contactInfo && $contactInfo->whatsapp)
        <p style="margin-bottom:10px;"><span style="color:var(--muted); font-size:.85rem;">WhatsApp</span><br>
        <a href="https://wa.me/{{ $contactInfo->whatsapp }}" target="_blank" style="color:var(--text); text-decoration:none; font-weight:600;">{{ $contactInfo->whatsapp }}</a></p>
      @endif

      <div style="display:flex; gap:12px; margin-top:16px;">
        @if ($contactInfo && $contactInfo->github)
          <a href="{{ $contactInfo->github }}" target="_blank" style="width:38px; height:38px; border-radius:50%; background:var(--panel-2); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; color:var(--blue-2); font-size:.75rem; font-weight:700; text-decoration:none;">GH</a>
        @endif
        @if ($contactInfo && $contactInfo->linkedin)
          <a href="{{ $contactInfo->linkedin }}" target="_blank" style="width:38px; height:38px; border-radius:50%; background:var(--panel-2); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; color:var(--blue-2); font-size:.75rem; font-weight:700; text-decoration:none;">in</a>
        @endif
        @if ($contactInfo && $contactInfo->instagram)
          <a href="{{ $contactInfo->instagram }}" target="_blank" style="width:38px; height:38px; border-radius:50%; background:var(--panel-2); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; color:var(--blue-2); font-size:.75rem; font-weight:700; text-decoration:none;">IG</a>
        @endif
      </div>
    </div>

    <div>
      @if (session('success'))
        <p style="margin-bottom:14px; padding:12px 16px; background:rgba(74,222,128,0.1); color:#4ade80; border-radius:8px; font-size:.9rem; font-weight:600;">{{ session('success') }}</p>
      @endif

      <form action="{{ route('contact.store') }}" method="POST" style="display:flex; flex-direction:column; gap:10px;">
        @csrf
        <input type="text" name="name" placeholder="Nama Anda" required style="background:var(--panel-2); border:1px solid var(--border); color:var(--text); padding:12px 14px; border-radius:8px; font-family:'Inter',sans-serif;">
        <input type="email" name="email" placeholder="Email Anda" required style="background:var(--panel-2); border:1px solid var(--border); color:var(--text); padding:12px 14px; border-radius:8px; font-family:'Inter',sans-serif;">
        <textarea name="message" placeholder="Pesan Anda..." rows="4" required style="background:var(--panel-2); border:1px solid var(--border); color:var(--text); padding:12px 14px; border-radius:8px; font-family:'Inter',sans-serif; resize:vertical;"></textarea>
        <button type="submit" style="font-weight:600; padding:13px 26px; border-radius:10px; border:none; cursor:pointer; background:linear-gradient(135deg, var(--blue), #3a6fe0); color:#fff;">Kirim Pesan</button>
      </form>
    </div>
  </div>
</section>

<footer style="text-align:center; color:var(--muted); font-size:.85rem; padding:30px; position:relative; z-index:1;">
  Built with Laravel 🚀
</footer>

<!-- Certificate Modal -->
<div id="certModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.75); z-index:1000; align-items:center; justify-content:center;">
  <div style="background:var(--panel); border:1px solid var(--border); padding:20px; border-radius:12px; max-width:90%; max-height:90%; overflow:auto; position:relative;">
    <button onclick="closeCertModal()" style="position:absolute; top:10px; right:10px; background:var(--blue); color:white; border:none; border-radius:50%; width:32px; height:32px; cursor:pointer; font-weight:bold;">&times;</button>
    <div id="certModalContent" style="margin-top:20px;"></div>
  </div>
</div>

<script>
function openCertModal(url, type) {
    const modal = document.getElementById('certModal');
    const content = document.getElementById('certModalContent');
    content.innerHTML = type === 'pdf'
        ? '<iframe src="' + url + '" style="width:80vw; height:80vh; border:none;"></iframe>'
        : '<img src="' + url + '" style="max-width:80vw; max-height:80vh;">';
    modal.style.display = 'flex';
}
function closeCertModal() {
    document.getElementById('certModal').style.display = 'none';
    document.getElementById('certModalContent').innerHTML = '';
}

@if (!($profile && $profile->bio))
const nickData = [
    { word: "Zakkiy", font: "f-mono" }, { word: "Zahir", font: "f-display" },
    { word: "Kiyyza", font: "f-sora" }, { word: "Seki", font: "f-mono" },
    { word: "Njak", font: "f-display" }, { word: "Sahir", font: "f-sora" },
    { word: "Muza", font: "f-mono" }
];
const nickEl = document.getElementById('typedNick');
let ni = 0, nci = 0, nDeleting = false;
function tickNick(){
    const item = nickData[ni];
    if(!nDeleting){
        nci++;
        nickEl.textContent = item.word.slice(0, nci);
        if(nci === item.word.length){ nDeleting = true; setTimeout(tickNick, 1800); return; }
    } else {
        nci--;
        nickEl.textContent = item.word.slice(0, nci);
        if(nci === 0){ nDeleting = false; ni = (ni + 1) % nickData.length; }
    }
    setTimeout(tickNick, nDeleting ? 55 : 110);
}
setTimeout(tickNick, 800);
@endif
</script>

@endsection