@extends('layouts.admin')

@section('content')
    <section class="bg-dark">
        <header class="py-3 bg-danger text-light">
            <div class="container">
                <h1 class=" text-center">{{ $project->title }}</h1>
            </div>
        </header>
        <section class="py-5">
            <div class="container d-flex gap-5">
                @if (Str::startsWith($project->image, 'https://'))
                    <img src="{{ $project->image }}" alt="">
                @else
                    <img width="500" src="{{ asset('storage/' . $project->image) }}" alt="">
                @endif
                <div>
                    <a class="btn btn-primary mx-1" href="{{ route('admin.projects.edit', $project) }}">
                        <i class="fas fa-pencil fa-xs fa-fw"></i>
                        <span style="font-size: 0.7rem" class="text-uppercase fs-6">Edit</span>
                    </a>
                    <p class="text-light py-5">{{ $project->description }}</p>
                    <div class="metadata">
                        <strong class="text-danger">Type:</strong> <span
                            class="text-light">{{ $project->type ? $project->type->name : 'Nessun Tipo' }}</span>
                    </div>
                    <div class="metadata">
                        <strong class="text-danger">Technology:</strong> 
                        <span class="text-light text-uppercase">
                            @foreach ($project->technologies as $technology)
                                {{ $technology->name }}
                            @endforeach
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
