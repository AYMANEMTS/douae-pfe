@extends('layouts.admin')

@section('title', 'Manage Articles')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Articles</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Article
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
                            <th>Title</th>
                            <th>Excerpt</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>
                                @if($article->image_path)
                                <img src="{{ asset('storage/' . $article->image_path) }}" 
                                     alt="{{ $article->title }}" 
                                     width="80">
                                @else
                                <div class="no-image">No image</div>
                                @endif
                            </td>
                            <td>{{ $article->title }}</td>
                            <td>{{ Str::limit($article->excerpt, 50) }}</td>
                            <td>{{ $article->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.articles.edit', $article->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" 
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