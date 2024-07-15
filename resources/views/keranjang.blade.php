@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container my-5">
        <h2 class="mb-5">Keranjang Belanja</h2>
        <hr class="mx-5">
        @if (count($cart) > 0)
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col" class="h5">Produk</th>
                    <th scope="col" class="h5">Jumlah</th>
                    <th scope="col" class="h5">Harga</th>
                    <th scope="col" class="h5">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $item)
                @php $total += $item['price'] * $item['quantity']; @endphp
                <tr>
                    <td class="align-middle">
                        <img src="{{ asset('images/'.$item['photo']) }}" alt="{{ $item['name'] }}" class="img-fluid img-thumbnail" style="width:50px; height:50px;">
                        <span class="ms-2">{{ $item['name'] }}</span>
                    </td>
                    <td class="align-middle">
                        <div class="input-group" style="width: 130px;">
                            <button type="button" class="btn btn-outline-secondary cart-decrease-quantity" data-id="{{ $item['id'] }}">-</button>
                            <input type="number" class="form-control text-center cart-quantity-input" id="cart-quantity-{{ $item['id'] }}" value="{{ $item['quantity'] }}" min="1" readonly>
                            <button type="button" class="btn btn-outline-secondary cart-increase-quantity" data-id="{{ $item['id'] }}">+</button>
                        </div>
                    </td>
                    <td class="align-middle">Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td class="align-middle">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <button type="submit" class="btn btn-secondary mt-3 ms-2"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <div class="button-item">
                <a href="/" class="btn btn-secondary me-3">Kembali</a>
                <a href="{{ route('checkout.index') }}" class="btn btn-warning">Checkout</a>
            </div>
            <h4>Total Pesanan: Rp. {{ number_format($total, 0, ',', '.') }}</h4>
        </div>
    </div>
    @else
    <p class="text-center align-middle">Belum ada pesanan</p>
    @endif
</div>
@endsection
</div>