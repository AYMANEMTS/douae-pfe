<section class="donuts" id="donuts">
  <div class="container">
    <h2 class="section-title"><i class="fas fa-donut"></i> Delicious Donuts</h2>
    <div class="donut-grid">
      @foreach($donuts as $product)
      <div class="donut-card">
        <div class="donut-image">
          <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" />
        </div>
        <div class="donut-details">
          <h3>{{ $product->name }}</h3>
          <p>{{ $product->description }}</p>
          <div class="donut-price">${{ number_format($product->price, 2) }}</div>
          <button class="add-to-cart"><i class="fas fa-cart-plus"></i> Add to Cart</button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>