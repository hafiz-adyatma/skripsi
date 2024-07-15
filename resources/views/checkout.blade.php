@extends('layouts.app')

@section('content')
<div class="container-fluid p-5">
    <h2 class="mb-4">Alamat Pengiriman</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="card border border-dark">
                <div class="card-body">
                    <form id="shipping-form">
                        @csrf
                        <div class="mb-3 flex-grow-1">
                            <label for="name" class="form-label">Nama penerima</label>
                            <input type="text" class="form-control border border-dark rounded-pill" id="name" name="name" placeholder="Nama penerima">
                        </div>
                        <div class="mb-3 flex-grow-1">
                            <label for="phone" class="form-label">Nomor HP</label>
                            <div class="input-group">
                                <span class="input-group-text rounded-start border border-dark">+62</span>
                                <input type="text" class="form-control border border-dark rounded-end" id="phone" name="phone" placeholder="Nomor HP">
                            </div>
                        </div>
                        <div class="mb-3 flex-grow-1">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control border border-dark rounded-pill" id="address" name="address" placeholder="Alamat">
                        </div>
                        <div class="mb-3 flex-grow-1 position-relative">
                            <label for="province" class="form-label">Provinsi</label>
                            <select class="form-control border border-dark rounded-pill" id="province" name="province">
                                <option value="" disabled selected>Pilih Provinsi</option>
                            </select>
                            <i class="fa fa-chevron-down position-absolute" style="right: 20px; top: 70%; transform: translateY(-50%);"></i>
                        </div>
                        <div class="mb-3 flex-grow-1 position-relative">
                            <label for="city" class="form-label">Kota</label>
                            <select class="form-control border border-dark rounded-pill" id="city" name="city">
                                <option value="" disabled selected>Pilih Kota</option>
                            </select>
                            <i class="fa fa-chevron-down position-absolute" style="right: 20px; top: 70%; transform: translateY(-50%);"></i>
                        </div>
                        <div class="mb-3 flex-grow-1">
                            <label for="postal_code" class="form-label">Kode pos</label>
                            <input type="text" class="form-control border border-dark rounded-pill" id="postal_code" name="postal_code" placeholder="Kode pos">
                        </div>
                        <div class="mb-3 flex-grow-1">
                            <label for="notes" class="form-label">Catatan</label>
                            <textarea class="form-control border border-dark rounded-pill" id="notes" name="notes" placeholder="Catatan" rows="3"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 border border-dark">
                <div class="card-body">
                    <h5 class="card-title">Detail Produk</h5>
                    @foreach ($cart as $key => $item)
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/' . $item['photo']) }}" alt="{{ $item['name'] }}" class="img img-thumbnail w-100">
                        </div>
                        <div class="col-8 my-auto">
                            <h6 class="mb-0">{{ $item['name'] }}</h6>
                            <p class="mb-0">Rp. {{ number_format($item['price'], 0, ',', '.') }}</p>
                            <p class="mb-0">Jumlah: {{ $item['quantity'] }}</p>
                            <p class="mb-0">Warna: {{ $item['color'] }}</p>
                        </div>
                    </div>
                    <hr class="my-3">
                    @endforeach
                </div>
            </div>
            <div class="card border border-dark">
                <div class="card-body">
                    <div class="card mb-3 border border-dark mx-3">
                        <div class="card-body justify-content-center">
                            <h5 class="card-title">Rekening Pembayaran</h5>
                            <p class="fw-semibold">Nama Rekening: Viegar Febrilian</p>
                            <p class="fw-semibold">No Rekening: 1440098745</p>
                            <p class="fw-semibold">Bank: BCA</p>
                            <p>Silahkan lakukan pembayaran pada rekening di atas, jika telah melakukan pembayaran klik
                                tombol
                                checkout untuk melanjutkan proses pemesanan.</p>
                        </div>
                    </div>
                    <h3 class="card-title text-center mb-3">Total Pembayaran</h3>
                    <div class="mx-5">
                        <div class="d-flex justify-content-between">
                            <p class="w-100 text-secondary">Sub-total:</p>
                            <p class="text-right w-75 fw-semibold">Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="w-100 text-secondary">Biaya pengiriman:</p>
                            <p class="text-right w-75 fw-semibold">Rp. {{ number_format($shippingCost, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="w-100">Total:</p>
                            <p class="text-right w-75 fw-semibold">Rp. {{ number_format($total, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <button id="checkout-button" class="btn btn-warning w-100">Checkout <i class="fa-solid fa-arrow-right ms-2"></i></button>
                </div>
            </div>
            <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection