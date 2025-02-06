@extends('layouts.app')
@section('title', 'Messages')
@section('content')
    <!-- Page Banner -->
    <section class="banner">
        <div class="container">
            <h1>Messages Management</h1>
            <p>View and manage contact messages. Editing is not permitted, but you may delete any message as needed.</p>
        </div>
    </section>
    
   
    <div class="container mt-5">
        <!-- Display success message -->
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


        <!-- Messages List Section -->
        <div>
            @if($messages->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Timestamp</th> <!-- New column for timestamp -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td style="max-width: 300px; white-space: normal; word-wrap: break-word; text-align: justify;">
                                {{ $message->message }}
                            </td>
                            <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <form action="{{ route('contactme.destroy', $message->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
        
                                <!-- Add Mark as Read button -->
                                @if(!$message->read)
                                    <form action="{{ route('contactme.markAsRead', $message->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-info btn-sm">Mark as Read</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No messages available.</p>
        @endif
        
        </div>
    </div>
@endsection
