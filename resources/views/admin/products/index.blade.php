@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Product
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
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $product->image_path) }}" 
                                     alt="{{ $product->name }}" 
                                     width="60" 
                                     class="img-thumbnail">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="badge 
                                    @if($product->category == 'featured') badge-primary
                                    @elseif($product->category == 'best-seller') badge-success
                                    @elseif($product->category == 'ice-cream') badge-info
                                    @elseif($product->category == 'donut') badge-warning
                                    @endif">
                                    {{ ucfirst($product->category) }}
                                </span>
                            </td>
                            <td>
                                @if($product->rating)
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star{{ $i <= $product->rating ? '' : '-empty' }}"></i>
                                    @endfor
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" 
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