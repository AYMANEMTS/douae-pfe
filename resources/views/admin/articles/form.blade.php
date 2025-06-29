<div class="card shadow">
    <div class="card-body">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" 
                   name="title" 
                   id="title" 
                   class="form-control"
                   value="{{ old('title', $article->title ?? '') }}"
                   required>
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea name="excerpt" 
                      id="excerpt" 
                      class="form-control" 
                      rows="2"
                      required>{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
            @error('excerpt')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" 
                      id="content" 
                      class="form-control" 
                      rows="5"
                      required>{{ old('content', $article->content ?? '') }}</textarea>
            @error('content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Article Image</label>
            <input type="file" 
                   name="image" 
                   id="image" 
                   class="form-control-file"
                   {{ !isset($article) ? 'required' : '' }}>
            @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            @if(isset($article) && $article->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $article->image_path) }}" 
                         alt="Current image" 
                         width="150">
                </div>
            @endif
        </div>
    </div>
</div>