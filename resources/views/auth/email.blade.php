@extends('layouts.app')

@section('title', 'Emails')

@section('content')
    <!-- Page Banner -->
    <section class="banner">
        <div class="container">
            <h1>Manage Your Emails</h1>
            <p>
                This list contains the emails of authenticated admins. If you've forgotten your password, you can use your email to reset it. Only admins with a registered email can initiate a password reset. Unauthorized users cannot access this list or perform any actions.
            </p>
        </div>
        
    </section>

    <div class="container mt-5">
        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add Email Form -->
        <div class="container">
            <div class="mb-5">
                <div class="card-body">
                    <form action="{{ route('emails.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-3 d-flex justify-content-center">
                                <div class="w-100" style="max-width: 800px;">
                                    <label for="phone" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" required style="width: 100%;">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success" style="width: 250px;">Add Email</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Email List Section -->
        <div>
            <h3 class="text-center mb-4">Existing Emails</h3>
            @if($emails->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emails as $email)
                            <tr>
                                
                                <td>{{ $email->email }}</td>
                                <td>
                                    <form action="{{ route('emails.destroy', $email->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this email?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No emails found.</p>
            @endif
        </div>
    </div>
@endsection
