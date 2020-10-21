<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Claim Token</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('claim/assets/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('claim/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('claim/assets/css/style.css')}}">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('claim/assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <img src="{{asset('claim/assets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <!-- header end -->
    <main>
        <!--? slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption text-center">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Ini adalah token yang digunakan untuk vote</h1>
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Hello {{ auth()->user()->name }}</h1>
                                    <p data-animation="fadeInUp" data-delay="0.4s">Perhatikan bahwa token hanya dapat di klaim satu kali dan tidak
                                    akan ditampilkan lagi</p>
                                    <form action="{{ url('/token') }}" method="get">
                                      @csrf

                                       <div class="form-group my-3">
                                          <label for="name"></label>
                                            <input type="text" class="form-control" id="gate" name="gate" value="hu" hidden>
                                         </div>
                                         <button type="submit" class="btn hero-btn" data-animation="fadeInUp" data-delay="0.7s">Claim Token</button>
                                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- slider Area End-->
        <div class="project-screen">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="screen-img">
                            <img src="{{asset('claim/assets/img/gallery/screen.png')}}" alt="" class=" w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer>
     <div class="footer-wrappper section-bg" data-background="claim/assets/img/gallery/footer-bg.png">
        <!-- Footer Start-->
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </div>
  </footer>

  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<script src="{{asset('claim/./assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('claim/./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('claim/./assets/js/popper.min.js')}}"></script>
<script src="{{asset('claim/')}}""./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('claim/./assets/js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('claim/./assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('claim/./assets/js/slick.min.js')}}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{asset('claim/./assets/js/wow.min.js')}}"></script>
<script src="{{asset('claim/./assets/js/animated.headline.js')}}"></script>
<script src="{{asset('claim/./assets/js/jquery.magnific-popup.js')}}"></script>

<!-- Date Picker -->
<script src="{{asset('claim/./assets/js/gijgo.min.js')}}"></script>
<!-- Nice-select, sticky -->
<script src="{{asset('claim/./assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('claim/./assets/js/jquery.sticky.js')}}"></script>
<!-- Progress -->
<script src="{{asset('claim/./assets/js/jquery.barfiller.js')}}"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{asset('claim/./assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('claim/./assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('claim/./assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('claim/./assets/js/hover-direction-snake.min.js')}}"></script>

<!-- contact js -->
<script src="{{asset('claim/./assets/js/contact.js')}}"></script>
<script src="{{asset('claim/./assets/js/jquery.form.js')}}"></script>
<script src="{{asset('claim/./assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('claim/./assets/js/mail-script.js')}}"></script>
<script src="{{asset('claim/./assets/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('claim/./assets/js/plugins.js')}}"></script>
<script src="{{asset('claim/./assets/js/main.js')}}"></script>

</body>
</html>
