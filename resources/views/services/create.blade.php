@extends('layouts.app')
@section('title', 'Services')
@section('content')
    <!-- Page Banner -->
    <section class="banner">
        <div class="container">
            <h1>Services Management</h1>
            <p>Effortlessly manage, update, and control your services from this dashboard.</p>
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
                    <form action="{{ isset($editService) ? route('services.update', $editService->id) : route('services.store') }}" method="POST">
                        @csrf
                        @if(isset($editService))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Service Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $editService->title ?? '' }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="icon" class="form-label">Select Icon</label>
                                <select name="icon" id="icon" class="form-control" required onchange="updateIconPreview()">
                                    <option value="fa-laptop-code" {{ (isset($editService) && $editService->icon == 'fa-laptop-code') ? 'selected' : '' }}>
                                        <i class="fa fa-laptop-code"></i> Web Development
                                    </option>
                                    <option value="fa-mobile-alt" {{ (isset($editService) && $editService->icon == 'fa-mobile-alt') ? 'selected' : '' }}>
                                        <i class="fa fa-mobile-alt"></i> App Development
                                    </option>
                                    <option value="fa-gamepad" {{ (isset($editService) && $editService->icon == 'fa-gamepad') ? 'selected' : '' }}>
                                        <i class="fa fa-gamepad"></i> Game Development
                                    </option>
                                    <option value="fa-search" {{ (isset($editService) && $editService->icon == 'fa-search') ? 'selected' : '' }}>
                                        <i class="fa fa-search"></i> SEO Optimization
                                    </option>
                                    <option value="fa-paint-brush" {{ (isset($editService) && $editService->icon == 'fa-paint-brush') ? 'selected' : '' }}>
                                        <i class="fa fa-paint-brush"></i> Graphic Design
                                    </option>
                                    <!-- Added UI/UX Design & Web Development Options -->
                                    <option value="fa-brush" {{ (isset($editService) && $editService->icon == 'fa-brush') ? 'selected' : '' }}>
                                        <i class="fa fa-brush"></i> UI/UX Design
                                    </option>
                                    <option value="fa-code" {{ (isset($editService) && $editService->icon == 'fa-code') ? 'selected' : '' }}>
                                        <i class="fa fa-code"></i> Web Development - Frontend
                                    </option>
                                    <option value="fa-cogs" {{ (isset($editService) && $editService->icon == 'fa-cogs') ? 'selected' : '' }}>
                                        <i class="fa fa-cogs"></i> Web Development - Backend
                                    </option>
                                    <!-- Replaced with fa-ellipsis-h -->
                                    <option value="fa-ellipsis-h" {{ (isset($editService) && $editService->icon == 'fa-ellipsis-h') ? 'selected' : '' }}>
                                        <i class="fa fa-ellipsis-h"></i> Others
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $editService->description ?? '' }}</textarea>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success" style="width: 250px;">{{ isset($editService) ? 'Update' : 'Create' }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Service List Section -->
            <div>
                <h3 class="text-center mb-4">Services List</h3>
                @if($services->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Icon Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <!-- Display the icon with the corresponding category -->
                                        @if(!empty($item->icon))
                                            <i class="fa {{ $item->icon }}"></i>
                                            @switch($item->icon)
                                                @case('fa-laptop-code')
                                                    Web Development
                                                    @break
                                                @case('fa-mobile-alt')
                                                    App Development
                                                    @break
                                                @case('fa-gamepad')
                                                    Game Development
                                                    @break
                                                @case('fa-search')
                                                    SEO Optimization
                                                    @break
                                                @case('fa-paint-brush')
                                                    Graphic Design
                                                    @break
                                                @case('fa-brush')
                                                    UI/UX Design
                                                    @break
                                                @case('fa-code')
                                                    Web Development - Frontend
                                                    @break
                                                @case('fa-cogs')
                                                    Web Development - Backend
                                                    @break
                                                @case('fa-ellipsis-h')
                                                    Others 
                                                    @break
                                                @default
                                                    General Service
                                            @endswitch
                                        @else
                                            <span>No icon selected</span>
                                        @endif
                                    </td>
                                    <td style="max-width: 300px; white-space: normal; word-wrap: break-word; text-align: justify;">
                                        {{ $item->description }}
                                    </td>
                                    <td>
                                        <a href="{{ route('services.index', ['editService' => $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('services.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No services available.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
