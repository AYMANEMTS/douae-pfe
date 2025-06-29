@extends('layouts.app')

@section('content')
<div class="hero" id="home">
    <div class="hero-content">
        <h1>Welcome to Artisan Delights</h1>
        <h2>Artisanal breads and pastries</h2>
        <p>Handcrafted with love tradition since 2005</p>
        <button class="cta-button">
            <i class="fas fa-shopping-cart"></i>Order Now
        </button>
    </div>
</div>

@include('partials.featured-products')
@include('partials.best-sellers')
@include('partials.ice-cream')
@include('partials.donuts')
@include('partials.about')
@include('partials.testimonials')
@include('partials.articles')
@include('partials.contact')
@endsection