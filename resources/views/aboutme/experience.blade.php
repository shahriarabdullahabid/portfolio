@extends('layouts.app')
@section('title', 'Experience')
@section('content')
    <section class="banner">
        <div class="container">
            <h1>Experience Management</h1>
            <p>Manage and update your professional experience.</p>
        </div>
    </section>

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Experience Form -->
        <div class="card-body">
            <form action="{{ isset($item) ? route('experience.update', ['id' => $item->id]) : route('experience.store') }}" method="POST">
                @csrf
                @if(isset($item))
                    @method('PUT')
                @endif

                <!-- Job Title Field -->
                <div class="mb-3">
                    <label for="title" class="form-label">Job Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title ?? '') }}" required>
                </div>

                <!-- Company Field -->
                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" name="company" id="company" class="form-control" value="{{ old('company', $item->company ?? '') }}" required>
                </div>

                <!-- Start Year Field -->
                <div class="mb-3">
                    <label for="start_year" class="form-label">Start Year</label>
                    <input type="text" name="start_year" id="start_year" class="form-control" value="{{ old('start_year', $item->start_year ?? '') }}" required>
                </div>

                <!-- End Year Field -->
                <div class="mb-3">
                    <label for="end_year" class="form-label">End Year</label>
                    <input type="text" name="end_year" id="end_year" class="form-control" value="{{ old('end_year', $item->end_year ?? '') }}">
                </div>

                <!-- Description Field -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', $item->description ?? '') }}</textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">{{ isset($item) ? 'Update' : 'Add Experience' }}</button>
            </form>
        </div>

        <!-- Experience List -->
<h3 class="text-center mb-4">Existing Professional Experience</h3>
@if($experiences->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Company</th>
                <th>Start Year</th>
                <th>End Year</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($experiences as $experience)
                <tr>
                    <td>{{ $experience->title }}</td>
                    <td>{{ $experience->company }}</td>
                    <td>{{ $experience->start_year }}</td>
                    <td>{{ $experience->end_year ?? 'Present' }}</td>
                    <td>{{ $experience->description }}</td>
                    <td>
                        <!-- Add inline-block or flex to keep the buttons side by side -->
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('experience.edit', ['id' => $experience->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('experience.destroy', ['id' => $experience->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-center">No professional experience found.</p>
@endif

    </div>
@endsection
