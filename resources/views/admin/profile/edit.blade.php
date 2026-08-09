<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Profile / About
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                @if (session('success'))
                    <p style="color: green; font-weight: bold; margin-bottom: 15px;">{{ session('success') }}</p>
                @endif

                @if ($profile && $profile->photo)
                    <img src="{{ asset('storage/' . $profile->photo) }}" style="max-width: 150px; border-radius: 8px; margin-bottom: 15px;">
                @endif

                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}" class="w-full border rounded px-3 py-2">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Title/Jabatan (contoh: Web Developer)</label>
                        <input type="text" name="title" value="{{ old('title', $profile->title ?? '') }}" class="w-full border rounded px-3 py-2">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Bio / Tentang Saya</label>
                        <textarea name="bio" rows="6" class="w-full border rounded px-3 py-2">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Foto Profil (opsional)</label>
                        <input type="file" name="photo" class="w-full border rounded px-3 py-2">
                        @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Foto Kedua (untuk section About, boleh beda gaya)</label>
                        @if (isset($profile) && $profile && $profile->photo_secondary)
                            <img src="{{ asset('storage/' . $profile->photo_secondary) }}" style="max-width: 120px; border-radius: 8px; margin-bottom: 10px; display: block;">
                        @endif
                        <input type="file" name="photo_secondary" class="w-full border rounded px-3 py-2">
                        @error('photo_secondary')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                        Simpan Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>