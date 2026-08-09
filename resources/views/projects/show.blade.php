@extends('layouts.public')

@section('title', $project->title . ' - Portfolio')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ url('/') }}#projects" style="color: #007bff; text-decoration: none;">&larr; Kembali ke Projects</a>
    </div>

    <div class="card">
        @if ($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 20px;">
        @endif

        <h1 style="color: #007bff;">{{ $project->title }}</h1>
        <small style="color: #777;">Dibuat pada: {{ $project->created_at->format('d M Y') }}</small>

        @if ($project->tech_stack)
            <div style="margin: 15px 0;">
                @foreach (explode(',', $project->tech_stack) as $tech)
                    <span style="display: inline-block; background: #e7f1ff; color: #007bff; padding: 4px 12px; border-radius: 12px; font-size: 0.85rem; margin-right: 5px; margin-bottom: 5px;">{{ trim($tech) }}</span>
                @endforeach
            </div>
        @endif

        <div style="margin: 20px 0;">
            <h3>Deskripsi</h3>
            <p>{{ $project->description }}</p>
        </div>

        <div style="margin-top: 20px;">
            @if ($project->github_link)
                <a href="{{ $project->github_link }}" target="_blank" style="display: inline-block; padding: 10px 20px; background: #333; color: white; text-decoration: none; border-radius: 5px; margin-right: 10px; font-weight: bold;">Lihat Source Code</a>
            @endif
            @if ($project->demo_link)
                <a href="{{ $project->demo_link }}" target="_blank" style="display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">Lihat Live Demo</a>
            @endif
        </div>
    </div>
@endsection