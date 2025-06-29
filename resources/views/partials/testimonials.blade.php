<section class="testimonials" id="testimonials">
  <div class="container">
    <h2 class="section-title"><i class="fas fa-comment"></i> What Our Customers Say</h2>
    <div class="testimonial-grid">
      @foreach($testimonials as $testimonial)
      <div class="testimonial-card">
        <img src="{{ asset('storage/' . $testimonial->author_image) }}" alt="{{ $testimonial->author_name }}">
        <p>"{{ $testimonial->content }}"</p>
        <h4>{{ $testimonial->author_name }}</h4>
        <div class="rating">
          @for($i = 1; $i <= 5; $i++)
            {{ $i <= $testimonial->rating ? '★' : '☆' }}
          @endfor
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>