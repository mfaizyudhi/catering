<x-layout>
    <x-slot name="title">Products</x-slot>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fw-bold">Semua Produk</h2>
            <form action="{{ url()->current() }}" method="GET" class="d-flex" style="max-width: 400px;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card product-card h-100">
                        <div class="position-relative">
                            <img src="{{ $product->image_url }}"
                                 class="card-img-top product-img" alt="{{ $product->name }}">
                            @if($product->old_price)
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">Sale</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-secondary mb-2">{{ $product->category->name ?? 'Uncategorized' }}</span>
                                <span class="text-{{ $product->stock > 0 ? 'success' : 'danger' }} small">
                                    {{ $product->stock > 0 ? 'Tersedia' : 'Habis' }}
                                </span>
                            </div>
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($product->description, 80) }}</p>
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
                        <p class="mb-0">Tidak ada produk yang ditemukan.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $products->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</x-layout>