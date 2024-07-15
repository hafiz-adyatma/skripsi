<nav class="col-md-3 col-lg-2 d-md-block sidebar mt-3">
    <div class="position-sticky d-flex flex-column h-100">
        <div>
            <a href="/admin/dashboard" class="d-flex align-items-center mb-3 mb-md-auto text-black text-decoration-none">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="me-2 img-fluid">
                <h3>Kampung Warna-Warni</h3>
            </a>
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link sidebar-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" aria-current="page" href="/admin/dashboard">
                        <i class="fa-solid fa-house me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-link {{ Request::is('admin/tambah') ? 'active' : '' }}" aria-current="page" href="/admin/tambah">
                        <i class="fa-solid fa-plus me-2"></i>
                        Tambah produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-link {{ Request::is('admin/edit') ? 'active' : '' }}" href="/admin/edit">
                        <i class="fa fa-edit me-2"></i>
                        Edit Produk
                    </a>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link sidebar-link" href="{{ url('api/auth/logout') }}">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
