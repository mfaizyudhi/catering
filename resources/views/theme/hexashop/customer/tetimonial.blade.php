@extends('layouts.customer')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Beri Testimonial</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.testimonial.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select class="form-select" id="rating" name="rating" required>
                                <option value="">Pilih Rating</option>
                                <option value="5">5 - Sangat Puas</option>
                                <option value="4">4 - Puas</option>
                                <option value="3">3 - Cukup</option>
                                <option value="2">2 - Kurang Puas</option>
                                <option value="1">1 - Tidak Puas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="testimonial" class="form-label">Testimonial Anda</label>
                            <textarea class="form-control" id="testimonial" name="testimonial" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection