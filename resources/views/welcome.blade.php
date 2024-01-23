<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" type="image/png" href="{{url('')}}/public/assets2/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{url('')}}/public/assets2/css/styles.css" />
    <title>ENKPAY AGENT DASHBOARD</title>
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <img src="{{url('')}}/public/assets2/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="{{url('')}}/public/assets2/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
                            <img src="{{url('')}}/public/assets2/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                            <img src="{{url('')}}/public/assets2/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-1 fs-7 fw-bolder">Welcome to Enkpay</h2>
                                <p class="mb-7">Agent Dashbaord</p>


                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                                @endif


                                <form action="login" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" required aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required id="exampleInputPassword1">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark fs-3" for="flexCheckChecked">
                                                Remeber this Device
                                            </label>
                                        </div>
                                        <a class="text-primary fw-medium fs-3" href="authentication-forgot-password.html">Forgot Password ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">New to IOT?</p>
                                        <a class="text-primary fw-medium ms-2" href="register">Create an
                                            account</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->

    <script src="{{url('')}}/public/assets2/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{url('')}}/public/assets2/js/app.min.js"></script>
    <script src="{{url('')}}/public/assets2/js/app.init.js"></script>
    <script src="{{url('')}}/public/assets2/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('')}}/public/assets2/libs/simplebar/dist/simplebar.min.js"></script>

    <script src="{{url('')}}/public/assets2/js/sidebarmenu.js"></script>
    <script src="{{url('')}}/public/assets2/js/theme.js"></script>

</body>

</html>
