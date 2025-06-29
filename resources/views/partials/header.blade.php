<header>
  <div class="container">
    <div class="logo">
      <h1>Artisan Delights</h1>
    </div>
    <nav>
      <ul class="nav-links">
        <li><a href="#home" class="{{ request()->is('/') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="#menu" class="{{ request()->is('menu') ? 'active' : '' }}"><i class="fas fa-utensils"></i> Menu</a></li>
        <li><a href="#about" class="{{ request()->is('about') ? 'active' : '' }}"><i class="fas fa-store"></i> About Us</a></li>
        <li><a href="#testimonials" class="{{ request()->is('testimonials') ? 'active' : '' }}"><i class="fas fa-comment"></i> Testimonials</a></li>
        <li><a href="#contact" class="{{ request()->is('contact') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Contact</a></li>
        @auth
          <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
          </li>
        @else
          <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        @endauth
      </ul>
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
  </div>
</header>