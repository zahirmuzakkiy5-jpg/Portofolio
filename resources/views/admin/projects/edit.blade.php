<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Project
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Judul Project</label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full border rounded px-3 py-2">
                        @error('title')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Foto Project</label>
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" style="max-width: 200px; margin-bottom: 10px;">
                        @endif
                        <input type="file" name="image" class="w-full border rounded px-3 py-2">
                        @error('image')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Link GitHub</label>
                        <input type="text" name="github_link" value="{{ old('github_link', $project->github_link) }}" placeholder="https://github.com/..." class="w-full border rounded px-3 py-2">
                        @error('github_link')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Link Demo (opsional)</label>
                        <input type="text" name="demo_link" value="{{ old('demo_link', $project->demo_link) }}" placeholder="https://..." class="w-full border rounded px-3 py-2">
                        @error('demo_link')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Tech Stack (pisah pakai koma)</label>
                        <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}" placeholder="Laravel, MySQL, Tailwind" class="w-full border rounded px-3 py-2">
                        @error('tech_stack')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            <span class="ml-2 font-semibold text-gray-700">Tampilkan sebagai Project Utama di Halaman Utama</span>
                        </label>
                        @error('is_featured')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Update Project
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>