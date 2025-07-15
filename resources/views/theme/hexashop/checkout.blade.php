<x-layout>
    <x-slot name="title">Checkout</x-slot>

    <div class="container my-5">
        <h1 class="mb-4 fw-bold">Checkout</h1>
        
        <div class="row g-5">
            <!-- Billing Details -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="mb-4 fw-bold">Detail Penagihan</h4>
                        
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                                
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                </div>
                                
                                <div class="col-12">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="address" placeholder="Jl. Contoh No. 123">
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="country" class="form-label">Negara</label>
                                    <select class="form-select" id="country">
                                        <option value="">Pilih...</option>
                                        <option>Indonesia</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label">Provinsi</label>
                                    <select class="form-select" id="state">
                                        <option value="">Pilih...</option>
                                        <option>Jawa Tengah</option>
                                        <option>Jawa Barat</option>
                                        <option>Jawa Timur</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="zip" class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" id="zip">
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h5 class="mb-3 fw-bold">Metode Pembayaran</h5>
                            
                            <div class="form-check mb-2">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked>
                                <label class="form-check-label" for="credit">Kartu Kredit</label>
                            </div>
                            <div class="form-check mb-2">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input">
                                <label class="form-check-label" for="debit">Debit</label>
                            </div>
                            <div class="form-check mb-4">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input">
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                            
                            <div class="row gy-3">
                                <div class="col-md-12">
                                    <label for="cc-name" class="form-label">Nama di Kartu</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="Nama sesuai kartu">
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="cc-number" class="form-label">Nomor Kartu Kredit</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="1234 5678 9012 3456">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="cc-expiration" class="form-label">Tanggal Kadaluarsa</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="MM/YY">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="cc-cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="123">
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Lanjutkan Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="mb-4 fw-bold">Ringkasan Pesanan</h5>
                        
                      <ul class="list-group mb-3">
    @isset($cart_items)
        @forelse($cart_items as $item)
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">{{ $item->itemable->name ?? 'Produk tidak tersedia' }}</h6>
                    <small class="text-muted">Qty: {{ $item->quantity }}</small>
                </div>
                <span class="text-muted">
                    Rp{{ number_format(($item->itemable->price ?? 0) * $item->quantity, 0, ',', '.') }}
                </span>
            </li>
        @empty
            <li class="list-group-item text-center py-4">
                <i class="bi bi-cart-x fs-1 text-muted"></i>
                <p class="mt-2 mb-0">Keranjang belanja kosong</p>
            </li>
        @endforelse
    @else
        <li class="list-group-item text-center py-4">
            <i class="bi bi-exclamation-triangle-fill fs-1 text-warning"></i>
            <p class="mt-2 mb-0">Data keranjang tidak tersedia</p>
        </li>
    @endisset
</ul>



                        
                        <div class="alert alert-info mt-3">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            Pesanan Anda akan diproses dalam 1-2 hari kerja setelah pembayaran diterima.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>