<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Skills
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                @if (session('success'))
                    <p style="color: green; font-weight: bold; margin-bottom: 15px;">{{ session('success') }}</p>
                @endif

                <a href="{{ route('admin.skills.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-4">
                    + Tambah Skill
                </a>

                @foreach ($skills as $skill)
                    <div style="border-bottom: 1px solid #eee; padding: 10px 0; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong>{{ $skill->name }}</strong>
                            
                            @if ($skill->description)
                                <p style="font-size: 0.9rem; color: #666;">{{ $skill->description }}</p>
                            @endif

                            @if ($skill->obtained_at)
                                <small style="color: #999;">Diperoleh: {{ \Carbon\Carbon::parse($skill->obtained_at)->format('d M Y') }}</small>
                            @endif

                            @if ($skill->certificate)
                                <br><a href="{{ asset('storage/' . $skill->certificate) }}" target="_blank" style="color: #007bff; font-size: 0.9rem;">Lihat Sertifikat</a>
                            @endif
                        </div>

                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus skill ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>