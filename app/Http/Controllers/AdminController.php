<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Dashboard
    public function dashboard()
    {
        $productCount = Product::count();
        $testimonialCount = Testimonial::count();
        $articleCount = Article::count();
        
        return view('admin.dashboard', compact('productCount', 'testimonialCount', 'articleCount'));
    }

    // ==================== PRODUCTS ====================
    public function productsIndex()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function productCreate()
    {
        $categories = ['featured', 'best-seller', 'ice-cream', 'donut'];
        return view('admin.products.create', compact('categories'));
    }

    public function productStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'badge' => 'nullable|string'
        ]);
        
        $imagePath = $request->file('image')->store('products', 'public');
        
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category' => $validated['category'],
            'image_path' => $imagePath,
            'rating' => $validated['rating'] ?? null,
            'badge' => $validated['badge'] ?? null
        ]);
        
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    public function productEdit(Product $product)
    {
        $categories = ['featured', 'best-seller', 'ice-cream', 'donut'];
        $badges = ['top-rated', 'popular', 'favorite'];
        return view('admin.products.edit', compact('product', 'categories', 'badges'));
    }

    public function productUpdate(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'badge' => 'nullable|string'
        ]);
        
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($product->image_path);
            
            // Store new image
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image_path'] = $imagePath;
        }
        
        $product->update($validated);
        
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function productDestroy(Product $product)
    {
        // Delete associated image
        Storage::disk('public')->delete($product->image_path);
        
        $product->delete();
        
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    // ==================== TESTIMONIALS ====================
    public function testimonialsIndex()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function testimonialCreate()
    {
        return view('admin.testimonials.create');
    }

    public function testimonialStore(Request $request)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        if ($request->hasFile('author_image')) {
            $imagePath = $request->file('author_image')->store('testimonials', 'public');
            $validated['author_image'] = $imagePath;
        }
        
        Testimonial::create($validated);
        
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully!');
    }

    public function testimonialEdit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function testimonialUpdate(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        if ($request->hasFile('author_image')) {
            // Delete old image
            if ($testimonial->author_image) {
                Storage::disk('public')->delete($testimonial->author_image);
            }
            
            // Store new image
            $imagePath = $request->file('author_image')->store('testimonials', 'public');
            $validated['author_image'] = $imagePath;
        }
        
        $testimonial->update($validated);
        
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    public function testimonialDestroy(Testimonial $testimonial)
    {
        // Delete associated image
        if ($testimonial->author_image) {
            Storage::disk('public')->delete($testimonial->author_image);
        }
        
        $testimonial->delete();
        
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully!');
    }

    // ==================== ARTICLES ====================
    public function articlesIndex()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function articleCreate()
    {
        return view('admin.articles.create');
    }

    public function articleStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $imagePath = $request->file('image')->store('articles', 'public');
        $validated['image_path'] = $imagePath;
        
        Article::create($validated);
        
        return redirect()->route('admin.articles.index')->with('success', 'Article added successfully!');
    }

    public function articleEdit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function articleUpdate(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($article->image_path);
            
            // Store new image
            $imagePath = $request->file('image')->store('articles', 'public');
            $validated['image_path'] = $imagePath;
        }
        
        $article->update($validated);
        
        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully!');
    }

    public function articleDestroy(Article $article)
    {
        // Delete associated image
        Storage::disk('public')->delete($article->image_path);
        
        $article->delete();
        
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully!');
    }
}