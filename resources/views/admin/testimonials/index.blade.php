@extends('layouts.admin')

@section('title', 'Manage Testimonials')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Testimonial
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Rating</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $testimonial)
                        <tr>
                            <td>
                                @if($testimonial->author_image)
                                <img src="{{ asset('storage/' . $testimonial->author_image) }}" 
                                     alt="{{ $testimonial->author_name }}" 
                                     width="50" 
                                     class="rounded-circle">
                                @else
                                <div class="no-image">No image</div>
                                @endif
                            </td>
                            <td>{{ $testimonial->author_name }}</td>
                            <td>
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star{{ $i <= $testimonial->rating ? '' : '-empty' }}"></i>
                                @endfor
                            </td>
                            <td>{{ Str::limit($testimonial->content, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection