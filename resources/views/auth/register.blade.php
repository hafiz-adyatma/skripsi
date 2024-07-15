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
                <div class="col-md-6 text-black d-flex align-items-center justify-content-center">
                    <div class="login-form w-75">
                        <h2 class="fw-bold mb-3">Get Started Now</h2>
                        <form method="post" action="{{ url('api/auth/register') }}" id="formRegister">
                            @csrf
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="fname">Full Name</label>
                                <input type="text" name="name" id="fname" class="form-control form-control-lg" placeholder="Enter your full name" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="email">Email address</label>
                                <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Enter your email" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter your password" />
                            </div>
                            <div class="form-check custom-checkbox mb-4">
                                <input type="checkbox" class="form-check-input" id="remember" />
                                <label class="form-check-label fw-bold" for="remember">I agree to the terms &
                                    policy</label>
                            </div>
                            <div class="d-grid mb-4">
                                <button type="submit" id="btnRegister" class="btn btn-lg text-white" style="background-color: #F79009;">Signup</button>
                            </div>
                            <div class="text-center mb-3">Or</div>
                            <button type="button" class="btn btn-outline-light w-100 mb-3 text-black">
                                <i class="fa-brands fa-google me-2"></i>
                                Sign in with Google
                            </button>
                        </form>
                        <p class="text-center">Have an account? <a href="{{ route('auth/login') }}" class="text-blue text-decoration-none">Sign In</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 px-0 d-none d-md-block">
                    <img src="{{ asset('../assets/auth/side-regist.png') }}" alt="Register image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('../js/auth.js') }}"></script>
    <script>
        $('#formRegister').submit(function(e) {
            e.preventDefault();

            const fname = $('#fname').val();
            const email = $('#email').val();
            const password = $('#password').val();
            const remember = $('#remember').is(':checked');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!fname) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Mohon isi nama terlebih dahulu!",
                    showConfirmButton: true,
                });
                $('#fname').focus();
                return;
            }

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
                $('#password').focus();
                return;
            }

            if (password.length < 5) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Password minimal terdiri dari 5 karater!",
                    showConfirmButton: true,
                });
                $('#password').focus();
                return;
            }

            if (!remember) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Anda belum menyetujui ketentuan & kebijakan!",
                    showConfirmButton: true,
                });
                $('#remember').focus();
                return;
            }

            let formData = $(this).serialize();

            $.ajax({
                url: "{{ url('api/auth/register') }}",
                type: "POST",
                data: formData,
                beforeSend: function() {
                    $('#btnRegister').attr('disabled', true);
                    $('#btnRegister').text("Mohon tunggu...");
                },
                success: function(response) {
                    if (!response.status) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal",
                            text: response.message,
                            showConfirmButton: true,
                        });
                        $('#btnRegister').attr('disabled', false);
                        $('#btnRegister').text("Signup");
                        return;
                    }

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: response.message,
                        showConfirmButton: true,
                    });
                    window.location.href = '/auth/login';
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Register failed: ' + xhr.responseText);
                }
            });
        })
    </script>
</body>

</html>