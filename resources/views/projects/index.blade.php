@extends('layouts.app')

@section('title', 'Semua Project - Portfolio')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="/" style="text-decoration: none; color: #007bff;">&larr; Kembali ke Home</a>
    </div>

    <h1>Semua Project Saya</h1>

    @foreach ($projects as $project)
        <div class="card">
            <h2 style="margin-top: 0; color: #007bff;">{{ $project->title }}</h2>
            <p>{{ $project->description }}</p>
            <small>Dibuat pada: {{ $project->created_at->format('d M Y') }}</small>
        </div>
    @endforeach
@endsection