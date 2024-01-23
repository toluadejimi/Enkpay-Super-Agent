<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/owl.carousel.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/public/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/public/assets/css/theme-1.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


    <!-- Favicon -->
    <link rel="icon" href="{{ url('') }}/public/assets/images/favicon.png">
    <link rel="apple-touch-icon" href="{{ url('') }}/public/assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('') }}/public/assets/images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('') }}/public/assets/images/icon-114x114.png">


  </head>
  <body>

    <div class="ugf-wrapper theme-bg">
      <div class="ugf-content-block">
        <div class="logo">
          <a href="../index.html">
            <img class="light-logo" src="{{ url('') }}/public/assets/images/logo.png" alt="logo">
            <img class="dark-logo" src="{{ url('') }}/public/assets/images/logo-dark2.png" alt="logo">
          </a>
    </div>


@yield('content')

<div class="ugf-sidebar flex-bottom ugf-sidebar-bg">
    <div class="testimonial-carousel owl-carousel">
      <div class="item">
        <div class="quote">
          <img src="{{ url('') }}/public/assets/images/quote.png" alt="">
        </div>
        <p>Reducing our carbon footprint is a step towards a sustainable tomorrow</p>
        <h5 class="name">Jimmy</h5>
        <span class="designation">CEO, Enkpay</span>
      </div>
      <div class="item">
        <div class="quote">
          <img src="{{ url('') }}/public/assets/images/quote.png" alt="">
        </div>
        <p>Small steps today, smaller footprints tomorrow.</p>
        <h5 class="name">Jimmy</h5>
        <span class="designation">CEO, Enkpay</span>
      </div>
      <div class="item">
        <div class="quote">
          <img src="{{ url('') }}/public/assets/images/quote.png" alt="">
        </div>
        <p>Think green, act clean – shrink your carbon footprint.</p>
        <h5 class="name">Jimmy</h5>
        <span class="designation">CEO, Enkpay</span>
      </div>
    </div>

  </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ url('') }}/public/assets/js/jquery.min.js"></script>
<script src="{{ url('') }}/public/assets/js/popper.min.js"></script>
<script src="{{ url('') }}/public/assets/js/bootstrap.min.js"></script>

<script src="{{ url('') }}/public/assets/js/owl.carousel.min.js"></script>

<script src="{{ url('') }}/public/assets/js/custom.js"></script>
</body>
</html>

