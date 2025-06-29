<div class="sidebar">
    <div class="sidebar-header">
        <h3>Artisan Delights</h3>
        <p>Admin Panel</p>
    </div>
    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fas fa-bread-slice"></i> Products
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
            <i class="fas fa-comment"></i> Testimonials
        </a>
        <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper"></i> Articles
        </a>
    </nav>
</div>