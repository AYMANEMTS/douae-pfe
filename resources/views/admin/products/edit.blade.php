@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Product</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Product Name *</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name', $product->name) }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description *</label>
                            <textarea class="form-control" id="description" name="description" 
                                      rows="3" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Price *</label>
                            <input type="number" step="0.01" class="form-control" id="price" 
                                   name="price" value="{{ old('price', $product->price) }}" required>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category *</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="featured" {{ old('category', $product->category) == 'featured' ? 'selected' : '' }}>Featured</option>
                                <option value="best-seller" {{ old('category', $product->category) == 'best-seller' ? 'selected' : '' }}>Best Seller</option>
                                <option value="ice-cream" {{ old('category', $product->category) == 'ice-cream' ? 'selected' : '' }}>Ice Cream</option>
                                <option value="donut" {{ old('category', $product->category) == 'donut' ? 'selected' : '' }}>Donut</option>
                            </select>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating (1-5)</label>
                            <input type="number" min="1" max="5" class="form-control" id="rating" 
                                   name="rating" value="{{ old('rating', $product->rating) }}">
                            @error('rating')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="badge">Badge</label>
                            <select class="form-control" id="badge" name="badge">
                                <option value="">No Badge</option>
                                <option value="top-rated" {{ old('badge', $product->badge) == 'top-rated' ? 'selected' : '' }}>Top Rated</option>
                                <option value="popular" {{ old('badge', $product->badge) == 'popular' ? 'selected' : '' }}>Popular</option>
                                <option value="favorite" {{ old('badge', $product->badge) == 'favorite' ? 'selected' : '' }}>Favorite</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image_path) }}" 
                             alt="Current product image" 
                             width="150">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Product
            </button>
        </div>
    </form>
</div>
@endsection