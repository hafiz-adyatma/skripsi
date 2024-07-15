@extends('admin.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3 h-auto">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="mb-3">Edit Produk</h1>
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/pace.png') }}" alt="User Image" class="rounded-circle me-2"
                    style="width: 40px; height: 40px;">
                <span>{{ session('name') }}</span>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($product as $p)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('images/' . $p['photo']) }}" alt="{{ $p['name'] }}" class="img img-thumbnail"
                            style="height: 300px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $p['name'] }}</h5>
                            <p class="card-text">Rp.{{ number_format($p['price'], 0, ',', '.') }}</p>
                            <a href="api/product/edit/{{ $p['id'] }}" class="btn btn-warning">View Details</a>
                            <button class="btn btn-danger btn-danger-custom"
                                onclick="confirmDelete({{ $p['id'] }})">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(productId) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Produk ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `{{ url('api/product/destroy') }}/${productId}`;
                }
            })
        }
    </script>
@endsection
