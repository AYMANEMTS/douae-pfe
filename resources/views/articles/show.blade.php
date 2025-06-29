@extends('layouts.app')

@section('content')
<div class="container py-5">
    <article class="article">
        <h1 class="article-title">{{ $article->title }}</h1>
        
        @if($article->image_path)
        <div class="article-image mb-4">
            <img src="{{ asset('storage/' . $article->image_path) }}" 
                 alt="{{ $article->title }}" 
                 class="img-fluid rounded">
        </div>
        @endif

        <div class="article-meta mb-4">
            <span class="text-muted">
                Published {{ $article->created_at->format('F j, Y') }}
            </span>
        </div>

        <div class="article-content">
            {!! nl2br(e($article->content)) !!}
        </div>
    </article>
</div>
@endsection