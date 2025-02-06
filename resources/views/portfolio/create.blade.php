@extends('layouts.app')
@section('title', 'Portfolio')
@section('content')

<!-- Page Banner -->
<section class="banner">
    <div class="container">
        <h1>Portfolio Management</h1>
        <p>View and manage your portfolio details, showcase your work, and keep your information up to date.</p>
    </div>
</section>



    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ isset($portfolio) ? 'Edit Portfolio' : 'Create Portfolio' }}</h2>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ isset($portfolio) ? route('portfolio.update', $portfolio->id) : route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($portfolio))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="project_name" class="form-label">Project Name</label>
                    <input type="text" name="project_name" class="form-control" value="{{ isset($portfolio) ? $portfolio->project_name : old('project_name') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" value="{{ isset($portfolio) ? $portfolio->category : old('category') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" {{ !isset($portfolio) ? 'required' : '' }}>
                    @if (isset($portfolio) && $portfolio->image)
                        <img src="{{ asset('storage/'.$portfolio->image) }}" alt="Portfolio Image" class="mt-2" width="150">
                    @endif
                </div>

                <div class="col-md-6 mb-3">
                    <label for="live_url" class="form-label">Live URL</label>
                    <input type="url" name="live_url" class="form-control" value="{{ isset($portfolio) ? $portfolio->live_url : old('live_url') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="github_url" class="form-label">GitHub URL</label>
                    <input type="url" name="github_url" class="form-control" value="{{ isset($portfolio) ? $portfolio->github_url : old('github_url') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="technologies" class="form-label">Technologies (comma separated)</label>
                    <input type="text" name="technologies" class="form-control" value="{{ isset($portfolio) ? implode(',', json_decode($portfolio->technologies)) : old('technologies') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="features" class="form-label">Features (comma separated)</label>
                    <input type="text" name="features" class="form-control" value="{{ isset($portfolio) ? implode(',', json_decode($portfolio->features)) : old('features') }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success" style="width: 250px;">{{ isset($portfolio) ? 'Update' : 'Create' }}</button>
            </div>
        </form>
    </div>

    <!-- Portfolio List Section -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">Existing Portfolios</h3>
        @if($portfolios->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Live URL</th>
                        <th>GitHub URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{ $portfolio->project_name }}</td>
                            <td>{{ $portfolio->category }}</td>
                            <td><img src="{{ asset('storage/'.$portfolio->image) }}" width="100"></td>
                            <td><a href="{{ $portfolio->live_url }}" target="_blank">Live</a></td>
                            <td><a href="{{ $portfolio->github_url }}" target="_blank">GitHub</a></td>
                            <td>
                                <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this portfolio?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No portfolios found.</p>
        @endif
    </div>
@endsection
