<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    {{ $style ?? '' }}

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #27ae60;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .product-card, .category-card {
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .category-card .card-body {
            padding: 1.25rem;
        }
        
        .category-card img {
            transition: transform 0.3s ease;
        }
        
        .category-card:hover img {
            transform: scale(1.1);
        }
        
        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .btn-outline-primary {
            color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--accent-color);
            color: white;
        }
        
        footer {
            background: var(--dark-color);
            color: white;
            padding: 3rem 0;
        }
        
        footer a {
            color: var(--light-color);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        footer a:hover {
            color: var(--accent-color);
        }
        
        .cart-item {
            transition: background-color 0.2s;
        }
        
        .cart-item:hover {
            background-color: rgba(0,0,0,0.02);
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        .alert {
            border-radius: 8px;
        }
        
        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
        }
        
        .quantity-input {
            width: 50px;
            text-align: center;
        }
        
        .total-section {
            font-size: 1rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        .product-img {
            height: 200px;
            object-fit: cover;
        }
        
        @media (max-width: 768px) {
            .product-img {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <x-navbar themeFolder="{{ $themeFolder }}"></x-navbar>

    <main class="container-fluid py-4">
        {{ $slot }}
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3 fw-bold">E-Commerce Pro</h5>
                    <p class="small">Solusi belanja online profesional dengan pengalaman pengguna yang unggul dan layanan terbaik.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="me-2"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="me-2"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="mb-3 fw-bold">Navigasi</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Beranda</a></li>
                        <li class="mb-2"><a href="/products">Produk</a></li>
                        <li class="mb-2"><a href="/categories">Kategori</a></li>
                        <li class="mb-2"><a href="/cart">Keranjang</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="mb-3 fw-bold">Layanan</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Bantuan</a></li>
                        <li class="mb-2"><a href="#">Kebijakan Privasi</a></li>
                        <li class="mb-2"><a href="#">Syarat & Ketentuan</a></li>
                        <li class="mb-2"><a href="#">Pengembalian</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6 class="mb-3 fw-bold">Kontak</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> info@ecommercepro.com</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i> +62 856 6100 994</li>
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center pt-3">
                <small>© {{ date('Y') }} E-Commerce Pro. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>