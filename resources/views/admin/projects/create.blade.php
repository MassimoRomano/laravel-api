@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h1>Add New Project</h1>
        </div>

    </header>

    @include('partials.errore')

    <div class="container py-5">

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelper" placeholder="Scrivi titolo" value="{{ old('title') }}" />
                <small id="titleHelper" class="form-text text-muted">Scrivi un titolo</small>
                @error('title')
                    <div class="text-danger pt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelper" placeholder="Inserisci url image" />
                <small id="imageHelper" class="form-text text-muted">Type a url_image for this post</small>
                @error('image')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Link Project</label>
                <input type="text" class="form-control @error('project') is-invalid @enderror" name="project"
                    id="project" aria-describedby="projectHelper" placeholder="Inserisci link progetto" />
                <small id="projectHelper" class="form-text text-muted">Type a Link for this project</small>
                @error('projects')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option selected>Select a Type of Project</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type')
                    <div class="text-danger py-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Technology</label>
                <div class=" d-flex gap-4 ">
                    @foreach ($technologies as $technology)
                        <div class="form-check form-switch">
                            <input name="technologies[]" class="form-check-input " type="checkbox" role="switch"
                                value="{{ $technology->id }}" id="technology-{{ $technology->id }}"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="technology-{{ $technology->id }}">
                                {{ $technology->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('technologies')
                    <div class="text-danger py-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    placeholder="scrivi una breve descrizione..." rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">
                Create
            </button>



        </form>
    </div>
@endsection
