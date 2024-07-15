@extends('layouts.app')

@section('content')
<div class="container-fluid p-5">
    <div class="row d-flex align-items-center">
        <div class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset('images/' . $product['photo']) }}" alt="{{ $product['name'] }}" class="img img-thumbnail img-fluid w-50">
        </div>
        <div class="col-md-6 d-flex flex-column align-items-start">
            <h2 class="mb-3">{{ $product['name'] }}</h2>
            <h4 class="mb-3">Rp. {{ number_format($product['price'], 0, ',', '.') }}</h4>
            <form action="{{ route('cart.add') }}" method="POST" class="w-100" id="cart-form">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <input type="hidden" name="name" value="{{ $product['name'] }}">
                <input type="hidden" name="price" value="{{ $product['price'] }}">
                <input type="hidden" name="photo" value="{{ $product['photo'] }}">
                <input type="hidden" name="color" value="{{ $product['color'] }}">
                @if(count($product['sizes']) != 0)
                <div class="form-group mb-4">
                    <label for="size" class="d-block mb-3">Ukuran:</label>
                    @foreach ($product['sizes'] as $size)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="size" id="size-{{ $size }}" value="{{ $size }}" required>
                        <label class="form-check-label btn size-btn" for="size-{{ $size }}" style="background-color: #F79009; color: white;">{{ $size->size }}</label>
                    </div>
                    @endforeach
                </div>
                @else
                <input type="hidden" name="size" value="-">
                @endif
                <div class="form-group mb-3 d-flex align-items-center">
                    <label for="quantity" class="me-2">Jumlah:</label>
                    <div class="input-group" style="width: 130px;">
                        <button type="button" class="btn btn-outline-secondary" id="decrease-quantity">-</button>
                        <input type="number" name="quantity" id="quantity" class="form-control text-center" value="1" min="1" style="appearance: none; -moz-appearance: textfield; -webkit-appearance: none;">
                        <button type="button" class="btn btn-outline-secondary" id="increase-quantity">+</button>
                    </div>
                </div>
            </form>
            <button id="buy-now" type="button" class="btn btn-warning mt-3 w-100" style="border-radius: .25rem;">Beli
                Sekarang</button>
            <button id="add-cart" type="button" class="btn btn-outline-dark mt-3 w-100 mb-3" style="border-radius: .25rem;">Masukkan Keranjang</button>
            <h3 class="fw-bold mt-5">Deskripsi</h3>
            <p>{{ $product['description'] }}</p>
        </div>
    </div>
</div>

@endsection