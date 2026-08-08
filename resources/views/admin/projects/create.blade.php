<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Project Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('admin.projects.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Judul Project</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Link Project (opsional)</label>
                        <input type="text" name="link" value="{{ old('link') }}" class="w-full border rounded px-3 py-2">
                        @error('link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                        Simpan Project
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>