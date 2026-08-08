<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded inline-block mb-4 transition">
                    + Tambah Project
                </a>

                @foreach ($projects as $project)
                    <div style="border-bottom: 1px solid #eee; padding: 10px 0; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong>{{ $project->title }}</strong>
                            <p>{{ $project->description }}</p>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm transition">
                                Edit
                            </a>

                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus project ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>