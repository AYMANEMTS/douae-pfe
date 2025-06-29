@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Add Testimonial</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.testimonials.form')
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Testimonial
            </button>
        </div>
    </form>
</div>
@endsection