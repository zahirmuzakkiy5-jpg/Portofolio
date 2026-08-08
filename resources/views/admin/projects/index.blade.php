<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                @foreach ($projects as $project)
                    <div style="border-bottom: 1px solid #eee; padding: 10px 0;">
                        <strong>{{ $project->title }}</strong>
                        <p>{{ $project->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>