<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Skill Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('admin.skills.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Nama Skill</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Laravel" class="w-full border rounded px-3 py-2">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Deskripsi Singkat (opsional)</label>
                        <textarea name="description" rows="3" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Tanggal Dapat Sertifikat (opsional)</label>
                        <input type="date" name="obtained_at" value="{{ old('obtained_at') }}" class="w-full border rounded px-3 py-2">
                        @error('obtained_at')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Sertifikat (PDF/Gambar, opsional)</label>
                        <input type="file" name="certificate" class="w-full border rounded px-3 py-2">
                        @error('certificate')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                        Simpan Skill
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>