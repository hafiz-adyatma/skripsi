<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kampung Warna Warni</title>
    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6ac6951179.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../css/auth.css') }}">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-black d-flex align-items-center justify-content-center mt-sm-5">
                    <div class="login-form w-75">
                        <h2 class="fw-bold mb-3">Welcome Back Admin!</h2>
                        <p class="mb-5 fw-bold">Enter your Credentials to access your account</p>
                        <form action="{{ url('api/auth/login') }}" method="POST" id="formLogin">
                            @csrf
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="email">Email address</label>
                                <input type="text" id="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" />
                            </div>
                            <div class="form-check custom-checkbox mb-4">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" />
                                <label class="form-check-label fw-bold" for="remember">Remember for 30 days</label>
                            </div>
                            <div class="d-grid mb-4">
                                <button type="submit" id="btnLogin" class="btn btn-lg text-white" style="background-color: #F79009;">Login</button>
                            </div>
                            <p class="text-center small mb-4"><a href="{{ route('auth/forgot-password') }}" class="text-muted">Forgot password?</a></p>
                            <div class="text-center mb-3">Or</div>
                            <button type="button" class="btn btn-outline-light w-100 mb-3 text-black">
                                <i class="fa-brands fa-google me-2"></i>
                                Sign in with Google
                            </button>
                        </form>

                        <p class="text-center">Don't have an account? <a href="{{ route('auth/register') }}" class="text-blue text-decoration-none">Sign Up</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 px-0 d-none d-md-block">
                    <img src="{{ asset('../assets/auth/side-auth.png') }}" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('../js/auth.js') }}"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "{{ session('success') }}",
            showConfirmButton: true,
        });
    </script>
    @endif
    <script>
        $('#formLogin').submit(function(e) {
            e.preventDefault();

            const email = $('#email').val();
            const password = $('#password').val();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!email) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Mohon isi email terlebih dahulu!",
                    showConfirmButton: true,
                });
                $('#email').focus();
                return;
            }

            if (!emailRegex.test(email)) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Format email tidak valid!",
                    showConfirmButton: true,
                });
                return;
            }

            if (!password) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Mohon isi password terlebih dahulu!",
                    showConfirmButton: true,
                });
                return;
            }

            let formData = $(this).serialize();

            console.log(formData)

            $.ajax({
                url: "{{ url('api/auth/login') }}",
                type: "POST",
                data: formData,
                beforeSend: function() {
                    $('#btnLogin').attr('disabled', true);
                    $('#btnLogin').text("Mohon tunggu...");
                },
                success: function(response) {
                    console.log(response);
                    if (!response.status) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal",
                            text: response.message,
                            showConfirmButton: true,
                        });
                        $('#btnLogin').attr('disabled', false);
                        $('#btnLogin').text("Login");
                        return;
                    }

                    const user = response.user;
                    if (user.id_role === 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.message,
                            showConfirmButton: true,
                        });
                        $('#btnLogin').attr('disabled', false);
                        $('#btnLogin').text("Login");
                        window.location.href = '/admin/dashboard';
                        return;
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.message,
                            showConfirmButton: true,
                        });
                        $('#btnLogin').attr('disabled', false);
                        $('#btnLogin').text("Login");
                        window.location.href = '/admin/tambah';
                        return;
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Login failed: ' + xhr.responseText);
                }
            });
        });
    </script>
</body>

</html>