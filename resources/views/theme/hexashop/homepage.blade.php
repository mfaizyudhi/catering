<x-layout>
    <x-slot name="title">Homepage - HexaShop</x-slot>
    <link rel="stylesheet" href="{{ asset('theme/hexashop/assets/css/hexashop.css') }}">



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
                            <img src="{{ $product->image_url}}"
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
                                        @if($i <=$product->rating)
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




</x-layout>