 @extends('layouts.app')

 @section('content')
 <div class="container my-5">
     <h2 class="mb-5 fw-bold">Detail Order</h2>
     <div class="row mb-5">
         <div class="col">
             <p class="fw-bold">Tanggal Transaksi:</p>
             <p>{{ $order['transaction_date'] }}</p>
         </div>
         <div class="col">
             <p class="fw-bold">Total Pembayaran:</p>
             <p>Rp. {{ number_format($order['total'], 0, ',', '.') }}</p>
         </div>
         <div class="col">
             <p class="fw-bold">Status:</p>
             <p>{{ $order['status'] }}</p>
         </div>
     </div>

     <div class="mb-5">
         <h5 class="fw-bold">Detail Pembelian</h5>
         <hr>
         @foreach ($order['cart'] as $item)
         <div class="row">
             <div class="col-2">
                 <img src="{{ asset('images/' . $item['photo']) }}" alt="{{ $item['name'] }}" class="img img-thumbnail w-100">
             </div>
             <div class="col-10 my-auto">
                 <h6 class="mb-2 font-weight-bold">{{ $item['name'] }}</h6>
                 <p class="mb-2">Rp. {{ number_format($item['price'], 0, ',', '.') }}</p>
                 <p class="mb-2">Jumlah: {{ $item['quantity'] }}</p>
                 <p class="mb-2">Warna: {{ $item['color'] }}</p>
             </div>
         </div>
         <hr class="my-2">
         @endforeach
     </div>

     <div>
         <h5 class="fw-bold">Detail Pengiriman</h5>
         <hr>
         <div class="row">
             <div class="col-md-2">Nama Penerima</div>
             <div class="col-md-10 d-flex align-items-center"><span class="me-3">:</span><span>{{ $order['name'] }}</span></div>
         </div>
         <div class="row">
             <div class="col-md-2">Nomor HP</div>
             <div class="col-md-10 d-flex align-items-center"><span class="me-3">:</span><span>{{ $order['phone'] }}
             </div>
         </div>
         <div class="row">
             <div class="col-md-2">Alamat</div>
             <div class="col-md-10 d-flex align-items-center"><span class="me-3">:</span><span>{{ $order['address'] }}</span></div>
         </div>
         <div class="row">
             <div class="col-md-2">Provinsi</div>
             <div class="col-md-10 d-flex align-items-center"><span class="me-3">:</span><span>{{ $order['province'] }}</div>
         </div>
         <div class="row">
             <div class="col-md-2">Kota</div>
             <div class="col-md-10 d-flex align-items-center"><span class="me-3">:</span><span>{{ $order['city'] }}
             </div>
         </div>
         <div class="row">
             <div class="col-md-2">Kode Pos</div>
             <div class="col-md-10 d-flex align-items-center"><span class="me-3">:</span><span>{{ $order['postal_code'] }}</div>
         </div>
         <div class="row">
             <div class="col-md-2">Catatan</div>
             <div class="col-md-10 d-flex align-items-center"><span class="me-3">:</span><span>{{ $order['notes'] }}
             </div>
         </div>
         <div class="d-flex mt-3 justify-content-end">
             <!-- <form action="{{ url('checkout/finish') }}" method="post">
                 @csrf
                 <input type="hidden" name="name" value="{{ $order['name'] }}">
                 <input type="hidden" name="phone" value="{{ $order['phone'] }}">
                 <input type="hidden" name="address" value="{{ $order['address'] }}">
                 <input type="hidden" name="province" value="{{ $order['province'] }}">
                 <input type="hidden" name="city" value="{{ $order['city'] }}">
                 <input type="hidden" name="postal_code" value="{{ $order['postal_code'] }}">
                 <input type="hidden" name="notes" value="{{ $order['notes'] }}">
                 <button class="btn btn-warning">Selesaikan Pesanan</button>
             </form> -->
             <form action="{{ url('checkout/finish') }}" method="post">
                 @csrf
                 <input type="hidden" name="name" value="{{ $order['name'] }}">
                 <input type="hidden" name="phone" value="{{ $order['phone'] }}">
                 <input type="hidden" name="address" value="{{ $order['address'] }}">
                 <input type="hidden" name="province" value="{{ $order['province'] }}">
                 <input type="hidden" name="city" value="{{ $order['city'] }}">
                 <input type="hidden" name="postal_code" value="{{ $order['postal_code'] }}">
                 <input type="hidden" name="notes" value="{{ $order['notes'] }}">

                 @foreach ($order['cart'] as $index => $item)
                 <input type="hidden" name="cart[{{ $index }}][name]" value="{{ $item['name'] }}">
                 <input type="hidden" name="cart[{{ $index }}][price]" value="{{ $item['price'] }}">
                 <input type="hidden" name="cart[{{ $index }}][quantity]" value="{{ $item['quantity'] }}">
                 <input type="hidden" name="cart[{{ $index }}][color]" value="{{ $item['color'] }}">
                 <input type="hidden" name="cart[{{ $index }}][photo]" value="{{ $item['photo'] }}">
                 @endforeach

                 <button class="btn btn-warning">Selesaikan Pesanan</button>
             </form>
         </div>
     </div>
 </div>
 @endsection