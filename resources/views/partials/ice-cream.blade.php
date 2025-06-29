<section class="ice-cream" id="ice-cream">
  <div class="container">
    <h2 class="section-title">
      <i class="fas fa-ice-cream"></i> Flavors of Ice Cream
    </h2>
    <div class="ice-cream-grid">
      @foreach($iceCreams as $product)
      <div class="ice-cream-card">
        <div class="ice-cream-color" style="background-color: {{ $product->color ?? '#f5f5f5' }}"></div>
        <div class="ice-cream-details">
          <h3>{{ $product->name }}</h3>
          <p>{{ $product->description }}</p>
          <div class="ice-cream-price">${{ number_format($product->price, 2) }}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>