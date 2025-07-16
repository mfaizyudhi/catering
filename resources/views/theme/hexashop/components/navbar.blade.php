<div>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
                <i class="bi bi-shop me-2"></i>
                <span>Cathering</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Produk</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <x-cart-icon>
                        
                    </x-cart-icon>

                    @if(auth()->guard('customer')->check())
                    <div class="dropdown ms-3">
                        <a class="btn btn-outline-light dropdown-toggle d-flex align-items-center" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>
                            <span>{{ Auth::guard('customer')->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-heart me-2"></i>Wishlist</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('customer.logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a class="btn btn-outline-light me-2" href="{{ route('customer.login') }}">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Login
                    </a>
                    <a class="btn btn-primary" href="{{ route('customer.register') }}">
                        <i class="bi bi-person-plus me-1"></i>Register
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>