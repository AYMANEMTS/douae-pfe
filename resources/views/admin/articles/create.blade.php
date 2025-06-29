@extends('layouts.admin')

@section('title', 'Add Article')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Add Article</h1>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.articles.form')
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Article
            </button>
        </div>
    </form>
</div>
@endsection