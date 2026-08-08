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
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Foto Project</label>
                        @if ($project->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="Preview" class="w-32 h-20 object-cover rounded border">
                            </div>
                        @endif
                        <input type="file" name="image" class="w-full border rounded px-3 py-2">
                        <small class="text-gray-500">Biarkan kosong jika tidak ingin mengubah foto.</small>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Link GitHub</label>
                        <input type="text" name="github_link" value="{{ old('github_link', $project->github_link) }}" placeholder="https://github.com/..." class="w-full border rounded px-3 py-2">
                        @error('github_link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Link Demo (opsional)</label>
                        <input type="text" name="demo_link" value="{{ old('demo_link', $project->demo_link) }}" placeholder="https://..." class="w-full border rounded px-3 py-2">
                        @error('demo_link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Tech Stack (pisah pakai koma)</label>
                        <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}" placeholder="Laravel, MySQL, Tailwind" class="w-full border rounded px-3 py-2">
                        @error('tech_stack')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                        Update Project
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>