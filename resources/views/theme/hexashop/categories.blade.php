<x-layout>
    <x-slot name="title">Categories</x-slot>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fw-bold">Semua Kategori</h2>
        </div>
        
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <a href="/category/{{ $category->slug }}" class="text-decoration-none">
                        <div class="card category-card h-100 border-0">
                            <div class="card-img-top bg-white p-4 text-center">
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     alt="{{ $category->name }}" 
                                     class="img-fluid" 
                                     style="height: 80px; object-fit: contain;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">{{ $category->name }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($category->description, 80) }}</p>
                                <span class="badge bg-primary mt-2">Lihat Produk</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-5">
            {{ $categories->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</x-layout>