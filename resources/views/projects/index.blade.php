@extends('layouts.public')

@section('title', 'Semua Project - Portfolio')

@section('content')

    <a href="{{ url('/') }}" class="back-link">&larr; Kembali ke Home</a>

    <h1>Semua Project</h1>

    @forelse ($projects as $project)
        <div class="card project-card">
            @if ($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" class="project-image" alt="{{ $project->title }}">
            @endif

            <h3 class="project-title">{{ $project->title }}</h3>
            <p>{{ Str::limit($project->description, 100) }}</p>

            @if ($project->tech_stack)
                <div class="project-tech-list">
                    @foreach (explode(',', $project->tech_stack) as $tech)
                        <span class="tech-tag">{{ trim($tech) }}</span>
                    @endforeach
                </div>
            @endif

            <a href="{{ url('/projects/' . $project->id) }}" class="project-link">
                View Detail &rarr;
            </a>

            <br><small class="project-date">Dibuat pada: {{ $project->created_at->format('d M Y') }}</small>
        </div>
    @empty
        <p class="empty-text">Belum ada project ditambahkan.</p>
    @endforelse

@endsection