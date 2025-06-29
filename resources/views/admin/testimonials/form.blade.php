<div class="card shadow">
    <div class="card-body">
        <div class="form-group">
            <label for="author_name">Author Name</label>
            <input type="text" 
                   name="author_name" 
                   id="author_name" 
                   class="form-control"
                   value="{{ old('author_name', $testimonial->author_name ?? '') }}"
                   required>
            @error('author_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" 
                      id="content" 
                      class="form-control" 
                      rows="3"
                      required>{{ old('content', $testimonial->content ?? '') }}</textarea>
            @error('content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="rating">Rating</label>
            <select name="rating" 
                    id="rating" 
                    class="form-control"
                    required>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" 
                            {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                        {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                    </option>
                @endfor
            </select>
            @error('rating')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author_image">Author Image</label>
            <input type="file" 
                   name="author_image" 
                   id="author_image" 
                   class="form-control-file">
            @error('author_image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            @if(isset($testimonial) && $testimonial->author_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $testimonial->author_image) }}" 
                         alt="Current image" 
                         width="100">
                </div>
            @endif
        </div>
    </div>
</div>