@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container d-flex justify-content-between">
            <h1 class="text-danger">Technologies</h1>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addTechnologyModal">
                <i class="fas fa-pencil fa-xs fa-fw"></i> New Tec
            </button>
        </div>
    </header>

    <div class="container my-5">
        <div class="table-responsive">
            <table class="table table-dark p-5">
                <thead class="text-center">
                    <tr>
                        <th class="text-danger" scope="col">ID</th>
                        <th class="text-danger" scope="col">Name</th>
                        <th class="text-danger" scope="col">Slug</th>
                        <th class="text-danger" scope="col">View</th>
                        <th class="text-danger" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($technologies as $technology)
                        <tr>
                            <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>{{ $technology->id }}</td>
                                <td>
                                    <input type="text" name="name" value="{{ $technology->name }}"
                                        class="form-control">
                                </td>
                                <td>{{ $technology->slug }}</td>
                                <td>
                                    <a class="btn btn-success" href="">
                                        <i class="fas fa-eye fa-xs fa-fw"></i>
                                        <span style="font-size: 0.7rem" class="text-uppercase"></span>
                                    </a>
                                </td>

                            </form>
                            <td>
                                <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fas fa-trash fa-xs fa-fw"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No technologies found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Technology Modal -->
    <div class="modal fade" id="addTechnologyModal" tabindex="-1" aria-labelledby="addTechnologyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTechnologyModalLabel">Add New Technology</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.technologies.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Technology</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
