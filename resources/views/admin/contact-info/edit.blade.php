<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Contact Info
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                @if (session('success'))
                    <p style="color: green; font-weight: bold; margin-bottom: 15px;">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('admin.contact-info.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Email</label>
                        <input type="text" name="email" value="{{ old('email', $contactInfo->email ?? '') }}" class="w-full border rounded px-3 py-2">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">WhatsApp (contoh: 6281234567890)</label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp', $contactInfo->whatsapp ?? '') }}" class="w-full border rounded px-3 py-2">
                        @error('whatsapp')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Link GitHub</label>
                        <input type="text" name="github" value="{{ old('github', $contactInfo->github ?? '') }}" class="w-full border rounded px-3 py-2">
                        @error('github')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Link LinkedIn</label>
                        <input type="text" name="linkedin" value="{{ old('linkedin', $contactInfo->linkedin ?? '') }}" class="w-full border rounded px-3 py-2">
                        @error('linkedin')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Link Instagram (opsional)</label>
                        <input type="text" name="instagram" value="{{ old('instagram', $contactInfo->instagram ?? '') }}" class="w-full border rounded px-3 py-2">
                        @error('instagram')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                        Simpan Contact Info
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>