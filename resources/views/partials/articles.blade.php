<section class="articles" id="articles">
  <div class="container">
    <h2 class="section-title"><i class="fas fa-newspaper"></i> Latest Articles</h2>
    <div class="articles-grid">
      @foreach($articles as $article)
      <div class="article-card">
        <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}">
        <div class="article-content">
          <h3>{{ $article->title }}</h3>
          <p>{{ $article->excerpt }}</p>
            <a href="{{ route('article.show', $article) }}">Read More</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>