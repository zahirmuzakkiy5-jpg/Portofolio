@extends('layouts.public')

@section('title', 'Semua Project - Portfolio')

@section('content')

    <div style="margin-bottom: 20px;">
        <a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">&larr; Kembali ke Home</a>
    </div>

    <h1>Semua Project</h1>

    @forelse ($projects as $project)
        <div class="card" style="margin-bottom: 15px;">
            @if ($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
            @endif

            <h3 style="margin-top: 0; color: #007bff;">{{ $project->title }}</h3>
            <p>{{ Str::limit($project->description, 100) }}</p>

            @if ($project->tech_stack)
                <div style="margin: 10px 0;">
                    @foreach (explode(',', $project->tech_stack) as $tech)
                        <span style="display: inline-block; background: #e7f1ff; color: #007bff; padding: 3px 10px; border-radius: 12px; font-size: 0.8rem; margin-right: 5px; margin-bottom: 5px;">{{ trim($tech) }}</span>
                    @endforeach
                </div>
            @endif

            <a href="{{ url('/projects/' . $project->id) }}" style="display: inline-block; margin-top: 10px; color: #007bff; text-decoration: none; font-weight: bold;">
                View Detail &rarr;
            </a>

            <br><small style="color: #777;">Dibuat pada: {{ $project->created_at->format('d M Y') }}</small>
        </div>
    @empty
        <p style="color: #999;">Belum ada project ditambahkan.</p>
    @endforelse

@endsection