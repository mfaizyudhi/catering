<x-layout>
    <x-slot name="title">Register</x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Daftar Akun Baru</h2>
                            <p class="text-muted">Isi form berikut untuk membuat akun</p>
                        </div>

                        @if(session('errorMessage'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ session('errorMessage') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('customer.store_register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror"  
                                    id="name" 
                                    name="name"  
                                    value="{{ old('name') }}" 
                                    required
                                    autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    id="email" 
                                    value="{{ old('email') }}" 
                                    required
                                    name="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror"  
                                    id="password" 
                                    value="{{ old('password') }}" 
                                    required
                                    name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input 
                                    type="password" 
                                    class="form-control @error('password_confirmation') is-invalid @enderror"   
                                    id="password_confirmation" 
                                    value="{{ old('password_confirmation') }}"
                                    required 
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                <i class="bi bi-person-plus me-2"></i> Daftar
                            </button>
                            
                            <div class="text-center">
                                <p class="text-muted mb-0">Sudah punya akun? 
                                    <a href="{{ route('customer.login') }}" class="text-decoration-none">Masuk disini</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>