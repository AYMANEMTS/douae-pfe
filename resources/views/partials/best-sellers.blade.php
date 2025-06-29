<section class="best-sellers" id="best-sellers">
  <div class="container">
    <h2 class="section-title"><i class="fas fa-crown"></i> Best Sellers</h2>
    <div class="product-grid">
      @foreach($bestSellers as $product)
      <div class="product-card">
        @if($product->badge)
        <div class="product-badge">
          <i class="fas 
            @if($product->badge == 'top-rated') fa-medal
            @elseif($product->badge == 'popular') fa-fire
            @elseif($product->badge == 'favorite') fa-heart
            @endif
          "></i> 
          {{ ucfirst(str_replace('-', ' ', $product->badge)) }}
        </div>
        @endif
        
        <div class="product-image">
          <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" />
        </div>
        <div class="product-details">
          <h3>{{ $product->name }}</h3>
          @if($product->rating)
          <div class="product-rating">
            @for($i = 1; $i <= 5; $i++)
              <i class="fas fa-star{{ $i <= $product->rating ? '' : '-empty' }}"></i>
            @endfor
            <span>({{ $product->review_count ?? 0 }})</span>
          </div>
          @endif
          <p>{{ $product->description }}</p>
          <button class="add-to-cart"><i class="fas fa-cart-plus"></i> Add to Cart</button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>