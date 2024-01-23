<!DOCTYPE html>
<html lang="en">



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('') }}/public/concept/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ url('') }}/public/concept/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('') }}/public/concept/assets/libs/css/style.css">
    <link rel="stylesheet" href="{{ url('') }}/public/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{ url('') }}/public/concept/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="{{ url('') }}/public/concept/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet"
        href="{{ url('') }}/public/concept/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('') }}/public/concept/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="{{ url('') }}/public/concept/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Log Marketplace </title>


</head>



<body>

    <style>
        .breadcrumb {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            list-style: none;
            background-color: #000000;
            border-radius: 0.25rem;
        }
    </style>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MD8JTK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <div class="main-wrapper black">





        <header class="d-flex flex-wrap align-items-center justify-content-center dark py-3 mb-4 border-bottom">


            <a href="/" class=" justify-content-center my-2 mr-3 me-3 text-dark">
                <strong class=" ">LOG MARKETPLACE</strong>
            </a>



            <ul class="nav col-12 col-md-auto mb-2 ml-3 justify-content-center  mb-md-0">
                <li><a href="/" class="nav-link badge badge-dark px-2 p-2 mr-2 link-secondary">
                        <ion-icon name="home-outline"></ion-icon> Home
                    </a></li>
                @if($user != null)
                <li><a href="/fund-wallet" class=" nav-link badge badge-dark p-2 mr-2 px-2 link-dark">
                        <ion-icon name="wallet-outline"></ion-icon> Fund Wallet
                    </a></li>
                @endif
                <li><a href="faq" class="badge badge-dark p-2 mr-2 nav-link px-2 mb-2 link-dark">
                        <ion-icon name="help-circle-outline"></ion-icon> FAQs
                    </a></li>
                @if($user != null)
                <li><a href="/fund-account" class="badge  justify-content-center badge-danger p-2  center-block">
                        <ion-icon name="wallet-outline"></ion-icon>
                        NGN{{ number_format(Auth::user()->wallet, 2) }}
                    </a></li>
                @endif
            </ul>

            @if($user == null)


            <ul class="nav col-md-auto mb-2  justify-content-center">
                <li> <button type="button" data-toggle="modal" data-target="#login"
                        class="btn btn-outline-dark mr-2 me-2">Login</button></li>
                <li><button type="button" data-toggle="modal" data-target="#register" class="btn btn-dark">
                        <ion-icon name="person-add-outline"></ion-icon> Sign-up
                    </button>
                </li>
            </ul>



            @else


            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li> <a href="/profile" class="btn btn-secondary mr-2">
                        <ion-icon name="person-circle-outline"></ion-icon> My Account
                    </a>
                </li>
                <li> <a href="/log-out" class="btn btn-dark">
                        <ion-icon name="log-out-outline"></ion-icon> Log Out
                    </a></li>
            </ul>








            @endif


        </header>













        {{-- Register Modal --}}

        <!-- Modal -->
        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <h5>Register</h5>

                        <form action="/register" method="POST">
                            @csrf

                            <div class="my-2">
                                <label>Username</label>
                                <input class="form-control" name="username" required type="text" autofocus
                                    placeholder="Enter your username">
                            </div>

                            <div class="my-2">
                                <label>Email</label>
                                <input class="form-control" name="email" required type="email" autofocus
                                    placeholder="Enter your Email Address">
                            </div>

                            <div class="my-2">
                                <label>Password</label>
                                <input class="form-control" name="password" required type="text" autofocus
                                    placeholder="Enter your Password">
                            </div>

                            <div class="my-2">
                                <label>Confirm Password</label>
                                <input class="form-control" name="password_confirmation" required type="text" autofocus
                                    placeholder="Confirm your Password">
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Register</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>


                        </form>


                    </div>

                </div>
            </div>
        </div>

        {{-- Login Modal --}}

        <!-- Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">

                        <h2>Login</h2>
                        <form action="/login" method="POST">
                            @csrf

                            <div class="my-2">
                                <label>Email</label>
                                <input class="form-control" name="email" required type="email" autofocus
                                    placeholder="Enter your Email">
                            </div>

                            <div class="my-2">
                                <label>Password</label>
                                <input class="form-control" name="password" required type="text" autofocus
                                    placeholder="Enter your password">
                            </div>



                            <a href="/forgot-password" class="mt-3 mb-3 text-dark">Forgot password</a>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Login</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>


                        </form>



                    </div>

                </div>
            </div>
        </div>



        <div class="shadow"></div>
        <script src="js/pages/header.min.js%3Fv=1.25" async></script>
        <section class="soc-category" id="content">




            <div class="container">
                <div class="flex">

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



                    <div class="col-lg-6 my-3">

                        <div class="card">
                            <div class="card-body ">



                                <form action="/reset-password-now" method="POST">
                                    @csrf
                                    <label>Enter your new password</label>
                                    <input  type="password" class="form-control" name="password" required autofocus>

                                    <label class="mt-3">Confirm password</label>
                                    <input  type="password" class="form-control" name="password_confirmation" required autofocus>

                                    <input  type="text" hidden class="form-control" name="email" value="{{ $email }}">


                                    <button class="btn btn-sm btn-dark my-3" type="submit">Reset</button>


                                </form>
                            </div>
                        </div>
                    </div>













                </div>





            </div>
        </section>



    </div>
    </div>





    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="https://t.me/logsmarkeplace" class="nav-link px-2 text-muted">Telegram</a></li>
                <li class="nav-item"><a href="faq" class="nav-link px-2 text-muted">FAQs</a></li>
            </ul>
            <p class="text-center text-muted">&copy; 2023 Log Market Place</p>
        </footer>
    </div>


    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>
