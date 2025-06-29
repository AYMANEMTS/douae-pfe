@extends('layouts.admin')

@section('title', 'Edit Article')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Article</h1>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.articles.form')
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Article
            </button>
        </div>
    </form>
</div>
@endsection