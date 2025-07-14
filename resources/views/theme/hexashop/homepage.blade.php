<x-layout>
    <x-slot name="title">Homepage - HexaShop</x-slot>
    <link rel="stylesheet" href="{{ asset('theme/hexashop/assets/css/hexashop.css') }}">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Temukan Produk Terbaik Anda</h1>
                    <p class="lead">Diskon hingga 70% untuk produk pilihan</p>
                    <div class="hero-cta">
                        <a href="/products" class="btn btn-primary">Belanja Sekarang</a>
                        <a href="#featured" class="btn btn-outline-light">Produk Unggulan</a>
                    </div>
                    <div class="hero-features">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Gratis Ongkir</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Garansi 30 Hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('hexashop/images/hero-image.png') }}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="category-section">
        <div class="container">
            <div class="section-header">
                <h2>Kategori Populer</h2>
                <div class="slider-controls">
                    <button class="slider-btn prev-category"><i class="bi bi-chevron-left"></i></button>
                    <button class="slider-btn next-category"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>

            <div class="category-slider">
                @foreach($categories as $category)
                <div class="category-item">
                    <a href="/category/{{ $category->slug }}" class="text-decoration-none">
                        <div class="category-icon">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                        </div>
                        <h6>{{ $category->name }}</h6>
                        <small>{{ $category->products_count }} produk</small>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products -->
<section class="featured-section" id="featured">
    <div class="container">
        <div class="section-header">
            <h2>Produk Unggulan</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Terbaru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Terlaris</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Diskon</a>
                </li>
            </ul>
        </div>

        <div class="product-grid-container">
            @forelse($products as $product)
            <div class="product-card-wrapper">
                <div class="product-card">
                    <div class="product-badge">
                        @if($product->old_price)
                        <span class="badge sale-badge">Sale</span>
                        @endif
                        @if($product->is_new)
                        <span class="badge new-badge">New</span>
                        @endif
                    </div>
                    <a href="{{ route('product.show', $product->slug) }}" class="product-image">
                        <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('hexashop/images/default-product.jpg') }}"
                            alt="{{ $product->name }}"
                            loading="lazy">
                    </a>
                    <div class="product-actions">
                        <button class="action-btn wishlist-btn" data-product-id="{{ $product->id }}">
                            <i class="bi bi-heart"></i>
                        </button>
                        <button class="action-btn quick-view-btn" data-product-id="{{ $product->id }}">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="product-details">
                        <a href="{{ route('product.show', $product->slug) }}" class="product-title">
                            {{ Str::limit($product->name, 40) }}
                        </a>
                        <div class="product-rating">
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $product->rating)
                                    <i class="bi bi-star-fill"></i>
                                    @else
                                    <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <small>({{ $product->reviews_count }})</small>
                        </div>
                        <div class="product-price">
                            <span class="current-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            @if($product->old_price)
                            <span class="old-price">Rp {{ number_format($product->old_price, 0, ',', '.') }}</span>
                            @endif
                        </div>
                        <a href="{{ route('product.show', $product->slug) }}" class="add-to-cart-link">
                        <button class="add-to-cart-btn" data-product-id="{{ $product->id }}">
                            <i class="bi bi-eye"></i> Detail Product
                        </button>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="no-products">
                <i class="bi bi-info-circle-fill"></i>
                <p>Belum ada produk tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

    <!-- Promo Banner -->
    <section class="promo-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="promo-card free-shipping">
                        <div class="promo-content">
                            <h3>Gratis Ongkir</h3>
                            <p>Minimal pembelian Rp 200.000</p>
                            <a href="#" class="promo-btn">Syarat & Ketentuan</a>
                        </div>
                        <img src="{{ asset('hexashop/images/delivery.png') }}" class="promo-img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="promo-card big-discount">
                        <div class="promo-content">
                            <h3>Diskon 50%</h3>
                            <p>Khusus produk pilihan</p>
                            <a href="#" class="promo-btn">Belanja Sekarang</a>
                        </div>
                        <img src="{{ asset('hexashop/images/discount.png') }}" class="promo-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
<section class="testimonial-section">
    <div class="container">
        <div class="section-header center">
            <h2>Apa Kata Pelanggan Kami</h2>
        </div>
        
        <div class="testimonial-grid">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ $testimonial->customer->avatar ?? asset('images/default-avatar.jpg') }}" 
                         class="user-avatar" 
                         alt="{{ $testimonial->customer->name }}">
                    <div>
                        <h6>{{ $testimonial->customer->name }}</h6>
                        <div class="stars">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < $testimonial->rating)
                                <i class="bi bi-star-fill"></i>
                                @else
                                <i class="bi bi-star"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="testimonial-text">"{{ $testimonial->testimonial }}"</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
</x-layout>