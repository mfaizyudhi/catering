<x-layout>
    <x-slot name="title">{{ $product->name }}</x-slot>

    @if(session('error'))
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container my-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/categories">Kategori</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $product->category->slug }}">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <!-- Product Images -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm mb-3">
                    @php
                    // Normalisasi path gambar
                    $imagePath = $product->image_url;

                    // Bersihkan path dari URL ganda
                    $cleanPath = str_replace(
                    ['http://127.0.0.1:8000/storage/', 'storage/'],
                    '',
                    $imagePath
                    );

                    // Generate URL akhir
                    $finalImageUrl = $cleanPath
                    ? asset('storage/' . ltrim($cleanPath, '/'))
                    : asset('images/placeholder-product.png');
                    @endphp

                    <img src="{{ $product->image_url }}"
                        class="img-fluid rounded"
                        alt="{{ htmlspecialchars($product->name) }}"
                        style="max-height: 500px; object-fit: contain;">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="mb-3">
                    <span class="badge bg-primary">{{ $product->category->name ?? 'Kategori Tidak Diketahui' }}</span>
                    @if($product->old_price)
                    <span class="badge bg-danger ms-2">Diskon {{ round(100 - ($product->price / $product->old_price * 100)) }}%</span>
                    @endif
                </div>

                <h1 class="mb-3 fw-bold">{{ $product->name }}</h1>

                <div class="mb-4">
                    @if($product->old_price)
                    <span class="text-muted text-decoration-line-through fs-5">Rp{{ number_format($product->old_price, 0, ',', '.') }}</span>
                    @endif
                    <span class="fs-3 fw-bold text-primary ms-2">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                </div>

                <div class="mb-4">
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-warning me-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <span class="text-muted small">(24 reviews)</span>
                    </div>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="quantity" class="col-form-label">Jumlah:</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" name="quantity" class="form-control" value="1" min="1" max="{{ $product->stock }}" style="width: 80px;">
                        </div>
                        <div class="col-auto">
                            <span class="form-text">
                                Stok: <span class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">{{ $product->stock > 0 ? $product->stock : 'Habis' }}</span>
                            </span>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                            <i class="bi bi-cart-plus me-2"></i> Tambah ke Keranjang
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-heart"></i>
                        </button>
                    </div>
                </form>

                <div class="card border-0 bg-light mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 text-center border-end">
                                <div class="text-muted small">Pengiriman</div>
                                <div class="fw-bold">2-3 Hari</div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="text-muted small">Garansi</div>
                                <div class="fw-bold">1 Tahun</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Description -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-4 fw-bold">Deskripsi Produk</h4>
                        <div class="product-description">
                            {!! nl2br(e($product->long_description ?? $product->description)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4 fw-bold">Produk Terkait</h3>
                <div class="row g-4">
                    @foreach($relatedProducts as $relatedProduct)
                    <div class="col-md-3">
                        <div class="card product-card h-100">
                            <img src="{{ $product->image_url }}">



                            <div class="card-body">
                                <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($relatedProduct->description, 60) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-primary">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</span>
                                    <a href="{{ route('product.show', $relatedProduct->slug) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if($relatedProducts->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-info text-center py-4">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            Tidak ada produk terkait.
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>