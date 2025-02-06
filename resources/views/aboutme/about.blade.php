@extends('layouts.app')
@section('title', 'About')

@section('content')
    <!-- Page Banner -->
    <section class="banner">
        <div class="container">
            <h1>About Information</h1>
            <p>Manage and update your about me details.</p>
        </div>
    </section>

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form to create or edit an entry -->
        <div class="card-body">
            <form action="{{ route('about.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($about) && $about->exists)
                    @method('PUT') <!-- Use PUT method for updating -->
                @endif

                <!-- Description Input -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', $about->description ?? '') }}</textarea>
                </div>

                <!-- Image Upload Section -->
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    @if(isset($about) && $about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Existing Image" class="mt-3" style="width: 100px; height: 100px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-success">{{ isset($about) && $about->exists ? 'Update' : 'Create' }} About Me</button>
            </form>
        </div>

        <!-- List of items -->
        @if($aboutList->count() > 0)
            <h3 class="text-center mb-4">Existing About Me Details</h3>
            <div class="row">
                @foreach($aboutList as $about)
                    <div class="col-12 col-sm-6 col-md-4 mb-4"> <!-- Adjusted for responsive grid -->
                        <div class="card">
                            <div class="card-body">
                                <p><strong>Description:</strong> {{ $about->description }}</p>
                                @if($about->image)
                                    <img src="{{ asset('storage/' . $about->image) }}" alt="Profile Image" class="mt-3" style="width: 150px; height: 150px;">
                                @else
                                    <p>No image available.</p>
                                @endif
                                <div class="mt-3">
                                    <form action="{{ route('about.destroy', $about->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">No About Me details found. You can create your profile information above.</p>
           
        @endif
    </div>
    
@endsection
