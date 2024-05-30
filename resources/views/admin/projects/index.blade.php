@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="text-danger">Projects</h1>
            <a class="btn btn-danger" href="{{ route('admin.projects.create') }}">New Project</a>
        </div>
    </header>
    @include('partials.success')
    <section class="py-5">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-dark align-middle">
                    <thead class="text-center">
                        <tr>
                            <th class="text-danger" scope="col">ID</th>
                            <th class="text-danger" scope="col">Image</th>
                            <th class="text-danger" scope="col">Title</th>
                            <th class="text-danger" scope="col">Project</th>
                            <th class="text-danger" scope="col">View</th>
                            <th class="text-danger" scope="col">Edit</th>
                            <th class="text-danger" scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($projects) --}}

                        @forelse ($projects as $project)
                            <tr class="text-center">
                                <td scope="row">{{ $project->id }}</td>
                                <td>
                                    @if (Str::startsWith($project->image, 'https://'))
                                        <img  width="120" src="{{ $project->image }}" alt="">
                                    @else
                                        <img  width="120" src="{{ asset('storage/' . $project->image) }}" alt="">
                                    @endif
                                </td>
                                <td>{{ $project->title }}</td>
                                <td >{{ $project->project }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.projects.show', $project) }}">
                                        <i class="fas fa-eye fa-xs fa-fw"></i>
                                        <span style="font-size: 0.7rem" class="text-uppercase"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary mx-1" href="{{ route('admin.projects.edit', $project) }}">
                                        <i class="fas fa-pencil fa-xs fa-fw"></i>
                                        <span style="font-size: 0.7rem" class="text-uppercase"></span>
                                    </a>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $project->id }}">
                                        <i class="fas fa-trash fa-xs fa-fw"></i>
                                        <span style="font-size: 0.7rem" class="text-uppercase"></span>
                                    </button>

                                    <!-- Modal Body -->
                                    <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark" id="modalTitle-{{ $project->id }}">
                                                        Rimuovi Progetto
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-dark">
                                                    Vuoi veramente cancellare questo progetto?
                                                    {{ $project->title }}


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                        Close
                                                    </button>

                                                    <form action="{{ route('admin.projects.destroy', $project) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-success">
                                                            Confirm
                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row">No post yet</td>

                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
