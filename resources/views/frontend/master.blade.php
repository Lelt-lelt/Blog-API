<!DOCTYPE html>
<html>
<head>
  <title>Ecommerce Design</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="text/css" href="{{asset('frontendTemplate/images/download.png')}}" >
  <link rel="stylesheet" type="text/css" href="{{asset('frontendTemplate/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontendTemplate/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontendTemplate/bootstrap/css/style.css')}}">
  <script type="text/javascript" src="{{asset('frontendTemplate/bootstrap/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontendTemplate/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('custom.js')}}"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
  <link rel="stylesheet" href="{{asset('frontendTemplate/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('frontendTemplate/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontendTemplate/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('frontendTemplate/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('frontendTemplate/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontendTemplate/css/owl.theme.default.min.css')}}">


  <link rel="stylesheet" href="{{asset('frontendTemplate/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('frontendTemplate/css/style.css')}}">
</head>

<body>
  @yield('nav')

  <div class="container my-5">
    @yield('content')
  </div>
  <footer class="site-footer custom-border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <h3 class="footer-heading mb-4">Promo</h3>
          <a href="#" class="block-6">
            <img src="{{asset('frontendTemplate/images/skincare.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
            <h3 class="font-weight-light  mb-0">Finding Your Perfect Series</h3>
            <p>Promo from  July 15 &mdash; 25, 2019</p>
          </a>
        </div>
        <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
          <div class="row">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Quick Links</h3>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Sell online</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Shopping cart</a></li>
                <li><a href="#">Store builder</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Mobile commerce</a></li>
                <li><a href="#">Dropshipping</a></li>
                <li><a href="#">Website development</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Point of sale</a></li>
                <li><a href="#">Hardware</a></li>
                <li><a href="#">Software</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <ul class="list-unstyled">
              <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
              <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
              <li class="email">emailaddress@domain.com</li>
            </ul>
          </div>

          <div class="block-7">
            <form action="#" method="post">
              <label for="email_subscribe" class="footer-heading">Subscribe</label>
              <div class="form-group">
                <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                <input type="submit" class="btn btn-sm btn-primary" value="Send">
              </div>
            </form>
          </div>
        </div>
        <div class="col-12">
          <p class="text-center mb-0">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <script src="{{asset('frontendTemplate/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('frontendTemplate/js/jquery-ui.js')}}"></script>
  <script src="{{asset('frontendTemplate/js/popper.min.js')}}"></script>
  <script src="{{asset('frontendTemplate/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontendTemplate/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontendTemplate/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontendTemplate/js/aos.js')}}"></script>

  <script src="{{asset('frontendTemplate/js/main.js')}}"></script>

</body>
</html>
