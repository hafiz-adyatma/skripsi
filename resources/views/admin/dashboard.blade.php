@extends('admin.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3 h-auto">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="mb-3">Halaman Dashboard</h1>
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/pace.png') }}" alt="User Image" class="rounded-circle me-2"
                    style="width: 40px; height: 40px;">
                <span>{{ session('name') }}</span>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card border border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Pengguna</h5>
                        <ul class="list-group">
                            @foreach ($users as $user)
                                <li class="list-group-item">{{ $user->name }} ({{ $user->email }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Produk</h5>
                        <ul class="list-group">
                            @foreach ($products as $product)
                                <li class="list-group-item">{{ $product->name }} (Rp.
                                    {{ number_format($product->price, 0, ',', '.') }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border border-dark mb-4">
            <div class="card-body">
                <h5 class="card-title">Grafik Produk Termahal</h5>
                <canvas id="productChart"></canvas>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('productChart').getContext('2d');

        const productNames = @json($productChart->pluck('name'));
        const productPrices = @json($productChart->pluck('price'));

        const productChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Harga Produk',
                    data: productPrices,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Harga (Rp)'
                        }
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafik Produk Termahal'
                    }
                }
            }
        });
    </script>
@endsection
