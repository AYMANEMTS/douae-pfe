<div class="navbar">
    <div class="navbar-left">
        <button class="sidebar-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="navbar-right">
        <div class="user-dropdown">
            <span>{{ Auth::user()->name }}</span>
            <i class="fas fa-user-circle"></i>
            <div class="dropdown-menu">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>