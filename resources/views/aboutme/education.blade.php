@extends('layouts.app')
@section('title', 'Education')
@section('content')
    <!-- Page Banner -->
    <section class="banner">
        <div class="container">
            <h1>Education Management</h1>
            <p>Manage and update your educational qualifications.</p>
        </div>
    </section>

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Education Form -->
        <div class="card-body">
            <form action="{{ isset($education) ? route('education.update', $education->id) : route('education.store') }}" method="POST">
                @csrf
                @if(isset($education))
                    @method('PUT') <!-- Use PUT method for updating -->
                @endif
            
                <div class="mb-3">
                    <label for="degree" class="form-label">Degree</label>
                    <input type="text" name="degree" id="degree" class="form-control" value="{{ old('degree', $education->degree ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="institution" class="form-label">Institution</label>
                    <input type="text" name="institution" id="institution" class="form-control" value="{{ old('institution', $education->institution ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="start_year" class="form-label">Start Year</label>
                    <input type="text" name="start_year" id="start_year" class="form-control" value="{{ old('start_year', $education->start_year ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="end_year" class="form-label">End Year</label>
                    <input type="text" name="end_year" id="end_year" class="form-control" value="{{ old('end_year', $education->end_year ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $education->description ?? '') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ isset($education) ? 'Update' : 'Create' }}</button>
            </form>
        </div>

      <!-- Education List -->
<h3 class="text-center mb-4">Existing Educational Details</h3>
@if(isset($educations) && $educations->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Degree</th>
                <th>Institution</th>
                <th>Start Year</th>
                <th>End Year</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($educations as $ed)
                <tr>
                    <td>{{ $ed->degree }}</td>
                    <td>{{ $ed->institution }}</td>
                    <td>{{ $ed->start_year }}</td>
                    <td>{{ $ed->end_year }}</td>
                    <td>{{ $ed->description }}</td>
                    <td>
                        <!-- Add inline-block or flex to ensure buttons stay side by side -->
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('education.edit', $ed->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('education.destroy', $ed->id) }}" method="POST">
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
    <p>No educational details found.</p>
@endif

            
    </div>
    
@endsection
