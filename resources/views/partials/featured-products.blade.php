<section class="featured-products" id="menu">
  <div class="container">
    <h2 class="section-title">
      <i class="fas fa-star"></i> Our Featured Delights
    </h2>
    <div class="product-grid">
      @foreach($featuredProducts as $product)
      <div class="product-card">
        <div class="product-image">
          <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" />
        </div>
        <div class="product-details">
          <h3>{{ $product->name }}</h3>
          <p>{{ $product->description }}</p>
          <div class="product-price">${{ number_format($product->price, 2) }}</div>
          <button class="add-to-cart"><i class="fas fa-cart-plus"></i> Add to Cart</button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>