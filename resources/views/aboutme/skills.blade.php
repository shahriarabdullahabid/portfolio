@extends('layouts.app')
@section('title', 'Skills')
@section('content')
    <!-- Page Banner -->
    <section class="banner">
        <div class="container">
            <h1>Skills Management</h1>
            <p>Manage and update your skill set.</p>
        </div>
    </section>

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Skill Form -->
        <div class="card-body">
            <!-- Form for Adding or Editing a Skill -->
            @if(isset($item)) 
            <form action="{{ route('skills.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
        @else 
            <form action="{{ route('skills.store') }}" method="POST">
                @csrf
        @endif
        

                <!-- Skill Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Skill Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name ?? '') }}" required>
                    <small class="form-text text-muted">Enter the name of the skill (e.g., Front-end Development, Back-end Development, etc.).</small>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $item->category ?? '') }}" required>
                    <small class="form-text text-muted">Specify the category this skill belongs to (e.g., Frontend, Backend, Design).</small>
                </div>

                <!-- Proficiency -->
                <div class="mb-3">
                    <label for="proficiency" class="form-label">Proficiency</label>
                    <input type="number" name="proficiency" id="proficiency" class="form-control" value="{{ old('proficiency', $item->proficiency ?? '') }}" required>
                    <small class="form-text text-muted">Enter your proficiency percentage (e.g., 85). Should be a number between 0 and 100.</small>
                </div>

              

                <button type="submit" class="btn btn-success">{{ isset($item) ? 'Update' : 'Add' }} Skill</button>
            </form>
        </div>

        <!-- Skill List -->
        <h3 class="text-center mb-4">Existing Skills</h3>
        @if($skills->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Skill Name</th>
                        <th>Category</th>
                        <th>Proficiency</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <td>{{ $skill->name }}</td>
                            <td>{{ $skill->category }}</td>
                            <td>{{ $skill->proficiency }}%</td>
                            <td>
                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No skills found.</p>
        @endif
    </div>
@endsection
