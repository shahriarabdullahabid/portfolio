@extends('layouts.app')
@section('title', 'Contact Details')
@section('content')
    <!-- Page Banner -->
    <section class="banner">
        <div class="container">
            <h1>Contact Details Management</h1>
            <p>Effortlessly manage, update, and control your contact details from this dashboard.</p>
        </div>
    </section>

    <div class="container mt-5">
        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form Section -->
        <div class="container">
            <div class="mb-5">
                <div class="card-body">
                    <form action="{{ isset($editContactDetail) ? route('contactdetails.update', $editContactDetail->id) : route('contactdetails.store') }}" method="POST">
                        @csrf
                        @if(isset($editContactDetail))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location" class="form-control" value="{{ $editContactDetail->location ?? '' }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $editContactDetail->email ?? '' }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $editContactDetail->phone ?? '' }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success" style="width: 250px;">
                                    {{ isset($editContactDetail) ? 'Update' : 'Create' }} Contact
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact List Section -->
            <div>
                <h3 class="text-center mb-4">Existing Contact Details</h3>
                @if($contactDetails->count())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactDetails as $detail)
                                <tr>
                                    <td>{{ $detail->location }}</td>
                                    <td>{{ $detail->email }}</td>
                                    <td>{{ $detail->phone }}</td>
                                    <td>
                                        <a href="{{ route('contactdetails.index', ['editContactDetail' => $detail->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('contactdetails.destroy', $detail->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No contact details found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
