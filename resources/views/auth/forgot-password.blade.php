<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kampung Warna Warni</title>
    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6ac6951179.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../css/auth.css') }}">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-black d-flex align-items-center justify-content-center">
                    <div class="login-form w-75">
                        <h2 class="fw-bold mb-3">Forgot Password?</h2>
                        <p class="mb-5 fw-bold">No worries, we'll send you reset instructions.</p>
                        <form>
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="form2Example18">Email address</label>
                                <input type="email" id="form2Example18" class="form-control form-control-lg"
                                    placeholder="Enter your email" />
                            </div>
                           
                            <div class="d-grid mb-4">
                                <button type="button" class="btn btn-lg text-white"
                                    style="background-color: #F79009;">Reset Password</button>
                            </div>
                        </form>
                        <p class="text-center"><a href="{{ route('auth/login') }}"
                                class="text-blue text-decoration-none">Back To Login</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 px-0 d-none d-md-block">
                    <img src="{{ asset('../assets/auth/side-auth.png') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('../js/auth.js') }}"></script>
</body>

</html>
