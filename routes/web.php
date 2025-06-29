<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Article;




// Frontend Routes
Route::get('/', function () {
    $featuredProducts = Product::where('category', 'featured')->get();
    $bestSellers = Product::where('category', 'best-seller')->get();
    $iceCreams = Product::where('category', 'ice-cream')->get();
    $donuts = Product::where('category', 'donut')->get();
    $testimonials = Testimonial::all();
    $articles = Article::latest()->take(3)->get();
    
    return view('pages.home', compact(
        'featuredProducts',
        'bestSellers',
        'iceCreams',
        'donuts',
        'testimonials',
        'articles'
    ));
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Products
    Route::get('/products', [AdminController::class, 'productsIndex'])->name('admin.products.index');
    Route::get('/products/create', [AdminController::class, 'productCreate'])->name('admin.products.create');
    Route::post('/products', [AdminController::class, 'productStore'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'productEdit'])->name('admin.products.edit');
    Route::put('/products/{product}', [AdminController::class, 'productUpdate'])->name('admin.products.update');
    Route::delete('/products/{product}', [AdminController::class, 'productDestroy'])->name('admin.products.destroy');
    
    // Testimonials
    Route::get('/testimonials', [AdminController::class, 'testimonialsIndex'])->name('admin.testimonials.index');
    Route::get('/testimonials/create', [AdminController::class, 'testimonialCreate'])->name('admin.testimonials.create');
    Route::post('/testimonials', [AdminController::class, 'testimonialStore'])->name('admin.testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [AdminController::class, 'testimonialEdit'])->name('admin.testimonials.edit');
    Route::put('/testimonials/{testimonial}', [AdminController::class, 'testimonialUpdate'])->name('admin.testimonials.update');
    Route::delete('/testimonials/{testimonial}', [AdminController::class, 'testimonialDestroy'])->name('admin.testimonials.destroy');
    
    // Articles
    Route::get('/articles', [AdminController::class, 'articlesIndex'])->name('admin.articles.index');
    Route::get('/articles/create', [AdminController::class, 'articleCreate'])->name('admin.articles.create');
    Route::post('/articles', [AdminController::class, 'articleStore'])->name('admin.articles.store');
    Route::get('/articles/{article}/edit', [AdminController::class, 'articleEdit'])->name('admin.articles.edit');
    Route::put('/articles/{article}', [AdminController::class, 'articleUpdate'])->name('admin.articles.update');
    Route::delete('/articles/{article}', [AdminController::class, 'articleDestroy'])->name('admin.articles.destroy');
});

// Contact Form Routes
Route::get('/contact', function () {
    return view('pages.home'); // Or create a dedicated contact page
})->name('contact');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Add this with your other article routes
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])
    ->name('article.show');