@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard">
    <h1>Dashboard</h1>
    
    <div class="stats">
        <div class="stat-card">
            <h3>Products</h3>
            <p>{{ $productCount }}</p>
            <a href="{{ route('admin.products.index') }}" class="btn">Manage</a>
        </div>
        
        <div class="stat-card">
            <h3>Testimonials</h3>
            <p>{{ $testimonialCount }}</p>
            <a href="#" class="btn">Manage</a>
        </div>
        
        <div class="stat-card">
            <h3>Articles</h3>
            <p>{{ $articleCount }}</p>
            <a href="#" class="btn">Manage</a>
        </div>
    </div>
</div>
@endsection