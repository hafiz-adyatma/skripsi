@extends('admin.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3 h-auto">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="mb-3">Tambah Produk</h1>
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/pace.png') }}" alt="User Image" class="rounded-circle me-2"
                    style="width: 40px; height: 40px;">
                {{ session('name') }}
            </div>
        </div>
        <form action="{{ url('/api/product/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card border border-secondary mb-5">
                <div class="card-body">
                    <h4 class="mb-3">Informasi Produk</h4>
                    <div class="mb-3">
                        <label for="nama-produk" class="form-label">Nama produk</label>
                        <input type="text" name="name" class="form-control border border-secondary" id="nama-produk"
                            placeholder="Nama produk">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi-produk" class="form-label">Deskripsi produk</label>
                        <textarea name="description" class="form-control border border-secondary" id="deskripsi-produk" rows="3"
                            placeholder="Deskripsi produk"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="color-produk" class="form-label">Warna produk</label>
                        <input type="text" name="color" class="form-control border border-secondary" id="color-produk"
                            placeholder="Warna produk">
                    </div>
                    <div class="mb-3">
                        <label for="harga-produk" class="form-label">Harga produk</label>
                        <input type="number" name="price" class="form-control border border-secondary" id="harga-produk"
                            placeholder="Harga produk">
                    </div>
                </div>
            </div>
            <div class="card border border-secondary mb-5">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h4 class="mb-2">Foto Produk</h4>
                            <label for="foto-produk" class="form-label">Format gambar jpg, jpeg atau png</label>
                        </div>
                        <div class="col-lg-6">
                            <div class="custom-file-container" id="file-upload-container">
                                <input type="file" name="photo" class="custom-file-input" id="foto-produk" multiple
                                    required>
                                <label class="custom-file-label" for="foto-produk">
                                    <i class="fa-solid fa-upload"></i> Drag & Drop foto disini
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border border-secondary">
                <div class="card-body">
                    <div class="mb-0">
                        <label for="ukuran-khusus" class="form-label">Apakah produk ini memiliki ukuran khusus?</label>
                        <input type="checkbox" id="ukuran-khusus" onclick="toggleSizeInfo()">
                    </div>
                    <div id="sizes" class="mb-3" style="display: none;">
                        <h4 class="mb-3">Informasi Produk</h4>
                        <div class="mb-3">
                            <label for="stock-produk" class="form-label">Stock</label>
                            <input type="number" name="sizes[0][stock]" class="form-control border border-secondary"
                                id="stock-produk" placeholder="Stock produk">
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="ukuran-produk" class="form-label">Ukuran produk</label>
                            <select class="form-control border border-secondary" name="sizes[0][size]" id="ukuran-produk">
                                <option value="null" disabled selected>Pilih Ukuran</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <i class="fa fa-chevron-down position-absolute"
                                style="right: 10px; top: 70%; transform: translateY(-50%);"></i>
                        </div>
                        <hr>
                    </div>
                    <button type="button" class="btn btn-warning" id="btnAddSize" onclick="addSize()"
                        style="display: none;">Add Size</button>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-warning">Tambah Produk</button>
            </div>
        </form>
    </main>

    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        let sizeCount = 1;

        function toggleSizeInfo() {
            var sizeInfo = document.getElementById("sizes");
            var btnAddSize = document.getElementById("btnAddSize");
            var checkbox = document.getElementById("ukuran-khusus");
            if (checkbox.checked) {
                sizeInfo.style.display = "block";
                btnAddSize.style.display = "block";
            } else {
                sizeInfo.style.display = "none";
                btnAddSize.style.display = "none";
            }
        }

        function addSize() {
            const sizesDiv = document.getElementById('sizes');
            const newSizeDiv = document.createElement('div');
            newSizeDiv.innerHTML = `
            <label for="stock-produk-${sizeCount}" class="form-label">Stock</label>
            <input type="number" name="sizes[${sizeCount}][stock]" class="form-control border border-secondary" id="stock-produk-${sizeCount}" placeholder="Stock produk">
            <div class="mt-3 position-relative">
                            <label for="ukuran-produk" class="form-label">Ukuran produk</label>
                            <select name="sizes[${sizeCount}][size]" class="form-control border border-secondary" id="ukuran-produk">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <i class="fa fa-chevron-down position-absolute"
                                style="right: 10px; top: 70%; transform: translateY(-50%);"></i>
                        </div> <hr>
    `;
            sizesDiv.appendChild(newSizeDiv);
            sizeCount++;
        }
    </script>
@endsection
