<x-layout>
    <x-slot name="title">Keranjang Belanja</x-slot>

    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container my-5">
        <h1 class="mb-4 fw-bold">Keranjang Belanja</h1>

        @if($cart && count($cart->items))
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            @foreach($cart->items as $item)
                                <div class="row align-items-center mb-4 pb-3 border-bottom">
                                    <div class="col-md-2">
                                        <img src="{{ $item->itemable->image_url ?? 'https://via.placeholder.com/100?text=No+Image' }}" 
                                             class="img-fluid rounded" 
                                             alt="{{ $item->itemable->name }}">
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="mb-1">{{ $item->itemable->name }}</h5>
                                        <p class="text-muted small mb-0">{{ $item->itemable->category->name ?? '' }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="action" value="decrease" 
                                                        class="btn btn-outline-secondary btn-sm" 
                                                        {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="text" name="quantity" value="{{ $item->quantity }}" 
                                                       class="form-control form-control-sm text-center mx-1" 
                                                       style="width: 50px;" readonly>
                                                <button type="submit" name="action" value="increase" 
                                                        class="btn btn-outline-secondary btn-sm">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <span class="fw-bold">Rp{{ number_format($item->itemable->price * $item->quantity, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="/products" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i> Lanjut Belanja
                    </a>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 fw-bold">Ringkasan Pesanan</h5>
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>Rp{{ number_format($cart->calculatedPriceByQuantity(), 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="d-flex justify-content-between mb-3">
                                <span>Ongkos Kirim</span>
                                <span>Gratis</span>
                            </div>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                                <span>Total</span>
                                <span>Rp{{ number_format($cart->calculatedPriceByQuantity(), 0, ',', '.') }}</span>
                            </div>
                            
                            <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100 py-2">
                                Lanjut ke Pembayaran
                            </a>
                            
                            <div class="alert alert-info mt-3 mb-0 small">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Gratis ongkir untuk pembelian di atas Rp500.000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
                    <h4 class="mt-3 mb-2">Keranjang Belanja Kosong</h4>
                    <p class="text-muted mb-4">Mulai belanja sekarang dan temukan produk menarik</p>
                    <a href="/products" class="btn btn-primary px-4">
                        <i class="bi bi-cart-plus me-2"></i> Belanja Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layout>