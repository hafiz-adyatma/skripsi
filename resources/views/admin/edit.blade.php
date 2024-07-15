@extends('admin.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3 h-auto">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="mb-3">Edit Produk</h1>
        <div class="d-flex align-items-center">
            <img src="{{ asset('assets/pace.png') }}" alt="User Image" class="rounded-circle me-2" style="width: 40px; height: 40px;">
            <span>{{ session('name') }}</span>
        </div>
    </div>
    <form action="{{ url('api/product/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="card border border-secondary mb-5">
            <div class="card-body">
                <h4 class="mb-3">Informasi Produk</h4>
                <div class="mb-3">
                    <label for="nama-produk" class="form-label">Nama produk</label>
                    <input type="text" name="name" class="form-control border border-secondary" id="nama-produk" value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label for="deskripsi-produk" class="form-label">Deskripsi produk</label>
                    <textarea class="form-control border border-secondary" name="description" id="deskripsi-produk" rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="color-produk" class="form-label">Warna produk</label>
                    <input type="text" name="color" class="form-control border border-secondary" id="color-produk" value="{{ $product->color }}" placeholder="Warna produk">
                </div>
                <div class="mb-3">
                    <label for="harga-produk" class="form-label">Harga produk</label>
                    <input type="number" name="price" class="form-control border border-secondary" id="harga-produk" value="{{ intval($product->price) }}" placeholder="Harga produk">
                </div>
            </div>
        </div>
        <div class="card border border-secondary mb-5">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h4 class="mb-2">Foto Produk</h4>
                        <label for="foto-produk" class="form-label">
                            Format gambar jpg, jpeg atau png maksimal 3 foto
                            yang diupload
                            <br>
                            <small class="text-danger">NB*: Kosongi jika tidak diubah</small>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <div class="custom-file-container" id="file-upload-container">
                            <input type="file" class="custom-file-input" id="foto-produk" multiple>
                            <label class="custom-file-label" for="foto-produk">
                                <i class="fa-solid fa-upload"></i> Drag & Drop foto disini
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(count($product_detail) != 0)
        <div class="card border border-secondary">
            <div class="card-body">
                <div id="sizes" class="mb-3">
                    <h4 class="mb-3">Informasi Produk</h4>
                    @foreach ($product_detail as $key => $d)
                    <div class="row">
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="stock-produk" class="form-label">Stock</label>
                                        <input type="text" name="sizes[{{ $key }}][stock]" value="{{ $d->stock }}" class="form-control border border-secondary" id="stock-produk" placeholder="Stock produk">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label for="ukuran-produk" class="form-label">Ukuran produk</label>
                                        <select name="sizes[{{ $key }}][size]" class="form-control border border-secondary" id="ukuran-produk">
                                            <option value="S" <?php if ($d->size === 'S') echo "selected"; ?>>S</option>
                                            <option value="M" <?php if ($d->size === 'M') echo "selected"; ?>>M</option>
                                            <option value="L" <?php if ($d->size === 'L') echo "selected"; ?>>L</option>
                                            <option value="XL" <?php if ($d->size === 'XL') echo "selected"; ?>>XL</option>
                                        </select>
                                        <i class="fa fa-chevron-down position-absolute" style="right: 10px; top: 70%; transform: translateY(-50%);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-secondary me-2 rounded-pill">Buang</button>
            <button type="submit" class="btn btn-warning">Simpan</button>
        </div>
    </form>
</main>
@endsection