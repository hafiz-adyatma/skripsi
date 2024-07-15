<nav @if (Request::is('/')) class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" 
@else  class="navbar navbar-expand-lg navbar-light" style="background-color: #F79009;" @endif
    id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="me-2">
            <span class="text-white fs-5">Kampung Warna-warni</span>
        </a>
        <button class="navbar-toggler text-white" type="button" id="sidebarToggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav fs-5">
                <li class="nav-item me-3">
                    <a class="nav-link text-white active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-white" aria-current="page" href="/about">About</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-white" href="/virtual-tour">Virtual Tour</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-white" href="/contact-us">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/cart">
                        <i class="fa-solid fa-cart-shopping fs-5"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="d-none">
        <button class="btn text-white" id="closeSidebar"
            style="background-color: #F79009; border-radius: 20px;">&times;</button>
        <ul class="navbar-nav fs-5 flex-column">
            <li class="nav-item me-3">
                <a class="nav-link text-white active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link text-white" aria-current="page" href="/about">About</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link text-white" href="/virtual-tour">Virtual Tour</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link text-white" href="/contact-us">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>
