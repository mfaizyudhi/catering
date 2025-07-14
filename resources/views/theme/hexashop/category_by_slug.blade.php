<x-layout>
    <x-slot name="title">{{ $category->name }}</x-slot>

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/categories">Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="fw-bold mb-2">{{ $category->name }}</h2>
                <p class="text-muted mb-0">{{ $category->description }}</p>
            </div>
            <span class="badge bg-primary">{{ $products->total() }} Produk</span>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card product-card h-100">
                        <div class="position-relative">
                            <img src="{{ $product->image_url ?: 'https://via.placeholder.com/350x200?text=No+Image' }}" 
                                 class="card-img-top product-img" 
                                 alt="{{ $product->name }}">
                            @if($product->old_price)
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">Sale</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($product->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    @if($product->old_price)
                                        <span class="text-muted text-decoration-line-through ms-2 small">Rp{{ number_format($product->old_price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center py-4">
                        <i class="bi bi-exclamation-circle fs-4"></i>
                        <p class="mb-0">Belum ada produk pada kategori ini.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $products->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</x-layout>