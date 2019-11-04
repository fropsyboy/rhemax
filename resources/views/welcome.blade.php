<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Able Share : SMS Platform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Able Share, SMS platform" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="{{ asset('front/css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('front/css/style.css') }}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="{{ asset('front/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>
    <div class="home">
        <!-- banner -->
        <div class="banner" id="banner">
            <!-- header -->
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
                    <h1>
                        <a class="navbar-brand text-white" href="index.html">
                            Able Share
                        </a>
                    </h1>
                    <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                            <li class="nav-item active  mr-lg-3">
                                <a class="nav-link" href="index.html">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                                <a class="nav-link scroll" href="#services">services</a>
                            </li>
                            <li class="nav-item dropdown mr-lg-3 mt-lg-0 mt-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Dropdown
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item scroll" href="#process">Process</a>
                                    <a class="dropdown-item scroll" href="#pricing">Pricing Plans</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item scroll" href="#partners">Partners</a>
                                </div>
                            </li>
                            <li class="nav-item mr-lg-3 mt-lg-0 mt-3">
                                <a class="nav-link scroll" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item mb-lg-0 mb-3">
                                <a class="nav-link scroll" href="#register">register</a>
                            </li>
{{--                            <li>--}}
{{--                                <button type="button" class="btn  ml-lg-2 w3ls-btn" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">--}}
{{--                                    Login--}}
{{--                                </button>--}}
{{--                            </li>--}}
                            <li>
                                <a href="{{route('login')}}">
                                    <button type="button" class="btn  ml-lg-2 w3ls-btn" >
                                        Login
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>
            <!-- //header -->
            <div class="container">
                <!-- banner-text -->
                <div class="banner-text text-center">
                    <div class="slider-info">
                        <h3> able-share SMS Online!</h3>
                        <p class="text-white">trusted by over 300,000 businesses worldwide</p>
                        <a class="btn btn-theme mt-lg-5 mt-3 agile-link-bnr  btn-outline-secondary btn-change5" href="{{route('login')}}" role="button" style="width: 15em;">Enter Portal</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- register -->
        <div class="w3-register py-4  position-relative" id="register">
            <img class="position-absolute img-fluid agile-img" src="{{ asset('front/images/i1.png') }}" alt="" />
            <div class="container py-lg-5">
                <div class="row register-form py-md-5">
                    <div class="offset-lg-2"></div>
                    <!-- register details -->
                    <div class="offset-lg-4">
                    </div>
                    <div class="col-lg-6 wthree-form-left py-md-5 pt-sm-5 pb-sm-3">
                        <div class="title-wthree">
                            <h3 class="agile-title">
                                register
                            </h3>
                            <span></span>
                        </div>
                        <!-- register form grid -->
                        <div class="register-top1">
                            <form action="{{ route('register') }}" method="POST" class="register-wthree">
                            @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 d-md-flex align-items-end justify-content-end px-md-0">
                                            <label class="mb-0">
                                                <span class="fas fa-user"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                First name
                                            </label>
                                            <input class="form-control" type="text" placeholder="Johnson" name="name" required autofocus>
                                        </div>
                                        <div class="col-md-5">
                                            <label>
                                                Last name
                                            </label>
                                            <input class="form-control" type="text" placeholder="Ogenekaro" name="lname" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 d-md-flex align-items-end justify-content-end px-md-0">
                                            <label class="mb-0">
                                                <span class="fas fa-envelope-open"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-11">
                                            <label>
                                                Email
                                            </label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Johnson@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 d-md-flex align-items-end justify-content-end px-md-0">
                                            <label class="mb-0">
                                                <span class="fas fa-lock"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-11">
                                            <label>
                                                password
                                            </label>
                                            <input type="password" class="form-control" placeholder="*******" name="password" id="password1" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 d-md-flex align-items-end justify-content-end px-md-0">
                                            <label class="mb-0">
                                                <span class="fas fa-lock"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-11">
                                            <label>
                                                confirm password
                                            </label>
                                            <input type="password" class="form-control" placeholder="*******" name="password_confirmation" id="password2" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-lg-5 mt-3">
                                    <div class="offset-1"></div>
                                    <div class="col-md-11">
                                        <button type="submit" class="btn btn-agile btn-block w-100">register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--  //register form grid ends here -->
                    </div>

                </div>
                <!-- //register details container -->
            </div>
        </div>
        <!-- //register -->
        <!-- services -->
        <div class="agileits-services py-5 position-relative" id="services">
            <span class="icon-trans">s</span>
            <div class="container py-lg-5">
                <div class="title-wthree text-center">
                    <h3 class="agile-title   text-white">
                        our services
                    </h3>
                    <span></span>
                </div>
                <div class="agileits-services-row row  py-md-5 pb-5">
                    <div class="col-lg-4">
                        <div class="agileits-services-grids">
                            <i class="fab fa-sellcast"></i>
                            <h4 class="sec-title">Instant delivery
                            </h4>
                            <span></span>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="agileits-services-grids mt-lg-0 mt-5">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <h4 class="sec-title">Real-time Report
                            </h4>
                            <span></span>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="agileits-services-grids mt-lg-0 mt-5">
                            <i class="fas fa-globe"></i>
                            <h4 class="sec-title">User friendly
                            </h4>
                            <span></span>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                        </div>
                    </div>
                </div>
                <div class="agileits-services-row row  pb-md-5">
                    <div class="col-lg-4">
                        <div class="agileits-services-grids">
                            <i class="fas fa-briefcase"></i>
                            <h4 class="sec-title">Open Sender IDs
                            </h4>
                            <span></span>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="agileits-services-grids mt-lg-0 mt-5">
                            <i class="far fa-image"></i>
                            <h4 class="sec-title">Guaranteed Delivery
                            </h4>
                            <span></span>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="agileits-services-grids mt-lg-0 mt-5">
                            <i class="far fa-paper-plane"></i>
                            <h4 class="sec-title">Competitive prices
                            </h4>
                            <span></span>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //services -->
        <!-- process -->
        <section class="wthree-row py-lg-5 position-relative" id="process">
            <span class="letter-02">w</span>
            <div class="container py-5">
                <div class="title-wthree text-center py-lg-5">
                    <h3 class="agile-title">
                        how it works
                    </h3>
                    <span></span>
                </div>
                <div class="row abbot-main py-lg-5 py-4 mb-sm-5">
                    <div class="col-lg-4 abbot-right">
                        <img src="{{ asset('front/images/p1.png') }}" class="img-fluid rounded-circle" alt="" />
                    </div>
                    <div class="offset-lg-2"></div>
                    <div class="col-lg-6 about-text-grid position-relative mt-lg-0 mt-5">
                        <div class="d-flex">
                            <span class="process-circle"></span>
                            <h4 class="sec-title1">Register</h4>
                        </div>
                        <p class="mt-md-5 mb-3 mt-3">Donec mi nulla, auctor nec sem a, ornare auctor m faucibus orci luctus et ultrices posuere cubilia
                            Curai. Sed mi tortor, commodo a felis in, fringilla tincidunt nulla. </p>
                        <p>fringilla tincidunt nulla onec mi nulla, auctor nec sem a, ornare auctor m faucibus orci luctus et
                            ultrices posuere cubilia Curai. Sed mi tortor, commodo a felis in. </p>
                        <div class="process-direction"></div>
                    </div>
                </div>
                <div class="row abbot-main py-lg-5 py-4 my-md-5">
                    <div class="col-lg-6 about-text-grid">
                        <div class="d-flex">
                            <h4 class="sec-title1 flow-odd">Fund Account
                            </h4>
                            <span class="process-circle"></span>
                        </div>
                        <ul class="list-group mt-md-3 my-3">
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Cras justo odio</li>
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Dapibus ac facilisis</li>
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Morbi leo risus</li>
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Porta ac consectetur</li>
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Vestibulum at eros</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 abbot-right">
                        <img src="{{ asset('front/images/p2.png') }}" class="img-fluid" alt="" />
                    </div>
                </div>
                <div class="row abbot-main py-lg-5 py-4 mb-sm-5">
                    <div class="col-lg-4 abbot-right">
                        <img src="{{ asset('front/images/p3.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="offset-lg-2"></div>
                    <div class="col-lg-6 about-text-grid position-relative">
                        <div class="d-flex">
                            <span class="process-circle"></span>
                            <h4 class="sec-title1">Send SMS's</h4>
                        </div>
                        <p class="mt-md-5 mb-3 mt-3">Fringilla tincidunt nulla onec mi nulla, auctor nec sem a, ornare auctor m faucibus orci luctus et
                            ultrices posuere cubilia Curai. Sed mi tortor, commodo a felis in. </p>
                        <p>Donec mi nulla, auctor nec sem a, ornare auctor m faucibus orci luctus et ultrices posuere cubilia
                            Curai. Sed mi tortor, commodo a felis in, fringilla tincidunt nulla. </p>
                        <div class="process-direction2"></div>
                    </div>
                </div>
                <div class="row abbot-main py-lg-5">
                    <div class="col-lg-6 about-text-grid">
                        <div class="d-flex">
                            <h4 class="sec-title1 flow-odd">View Report</h4>
                            <span class="process-circle"></span>
                        </div>
                        <ul class="list-group mt-md-3 my-3">
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Cras justo odio</li>
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Dapibus ac facilisis</li>
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Morbi leo risus</li>
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Porta ac consectetur</li>
                            <li class="list-group-item border-0">
                                <i class="fas fa-check mr-3"></i>Vestibulum at eros</li>
                        </ul>
                        <div class="process-direction-last"></div>
                    </div>
                    <div class="col-lg-4 abbot-right">
                        <img src="{{ asset('front/images/p4.jpg') }}" class="img-fluid rounded-circle" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- //process -->
        <!-- pricing plans -->
        <section class="wthree-row pb-lg-5 position-relative" id="pricing">
            <span class="icon-trans">p</span>
            <div class="container py-5">
                <div class="title-wthree text-center py-lg-5">
                    <h3 class="agile-title text-white">
                        plans & Pricing
                    </h3>
                    <span></span>
                </div>
                <div class="pricing card-deck flex-column flex-lg-row mb-sm-3">
                    <div class="card card-pricing text-center px-3 mb-4">
                        <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom btn-theme text-white shadow-sm">Starter</span>
                        <div class="bg-transparent card-header pt-4 border-0">
                            <h6 class="h6 font-weight-normal text-primary text-center mb-0" data-pricing-value="15">
                                <sup>&#8358;</sup>
                                <span class="price">1,000</span>
                                <span class="h6 text-muted ml-2">/ 1.2k(units)</span>
                            </h6>
                        </div>
                        <div class="card-body pt-0">
                            <ul class="list-unstyled mb-4">
                                <li>Up to 5 users</li>
                                <li>Basic support</li>
                                <li>Monthly updates</li>
                                <li>Free cancellation</li>
                                <li>Add one more Feature</li>
                            </ul>
                            <button type="button" class="btn btn-outline-secondary mb-3 btn-change5" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">Order now</button>
                        </div>
                    </div>
                    <div class="card card-pricing popular shadow text-center px-3 mb-4">
                        <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom btn-theme text-white shadow-sm">Professional</span>
                        <div class="bg-transparent card-header pt-4 border-0">
                            <h6 class="h6 font-weight-normal text-primary text-center mb-0" data-pricing-value="30">
                                <sup>&#8358;</sup>
                                <span class="price">2,000</span>
                                <span class="h6 text-muted ml-2">/ 2.2k(units)</span>
                            </h6>
                        </div>
                        <div class="card-body pt-0">
                            <ul class="list-unstyled mb-4">
                                <li>Up to 5 users</li>
                                <li>Basic support</li>
                                <li>Monthly updates</li>
                                <li>Free cancellation</li>
                            </ul>
                            <button type="button" class="btn btn-outline-secondary mb-3 btn-change5" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">Order now</button>
                        </div>
                    </div>
                    <div class="card card-pricing text-center px-3 mb-4">
                        <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom btn-theme text-white shadow-sm">Business</span>
                        <div class="bg-transparent card-header pt-4 border-0">
                            <h6 class="h6 font-weight-normal text-primary text-center mb-0" data-pricing-value="45">
                                <sup>&#8358;</sup>
                                <span class="price">3,000</span>
                                <span class="h6 text-muted ml-2">/ 3.3k(units)</span>
                            </h6>
                        </div>
                        <div class="card-body pt-0">
                            <ul class="list-unstyled mb-4">
                                <li>Up to 5 users</li>
                                <li>Basic support</li>
                                <li>Monthly updates</li>
                                <li>Free cancellation</li>
                            </ul>
                            <button type="button" class="btn btn-outline-secondary mb-3 btn-change5" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">Order now</button>
                        </div>
                    </div>
                    <div class="card card-pricing text-center px-3 mb-4">
                        <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom btn-theme text-white shadow-sm">Enterprise</span>
                        <div class="bg-transparent card-header pt-4 border-0">
                            <h6 class="h6 font-weight-normal text-primary text-center mb-0" data-pricing-value="60">
                                <sup>&#8358;</sup>
                                <span class="price">9,000</span>
                                <span class="h6 text-muted ml-2">/ 10k(units)</span>
                            </h6>
                        </div>
                        <div class="card-body pt-0">
                            <ul class="list-unstyled mb-4">
                                <li>Up to 5 users</li>
                                <li>Basic support</li>
                                <li>Monthly updates</li>
                                <li>Free cancellation</li>
                                <li>Add one more Feature</li>
                            </ul>
                            <button type="button" class="btn btn-outline-secondary mb-3 btn-change5" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">Order now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //pricing plans -->
        <!-- testimonials -->
        <div class="testimonials" id="testi">
            <div class="container">
                <div class="text-center">
                    <div class="callbacks_container">
                        <ul class="rslides" id="slider3">
                            <li>
                                <div class="testi-pos">
                                    <img src="{{ asset('front/images/t1.jpg') }}" alt="" class="img-fluid rounded-circle mb-3" />
                                    <h4>Daniel</h4>
                                    <span>School Teacher</span>
                                </div>
                                <div class="testi-agile">
                                    <p>
                                        <i class="fas fa-quote-left"></i>I have been using Able Share SMS for about 2 years now and i can say its the smoothest platform
                                        I have ever seen, it is very easy to use and the customer service center is 100% attentive.
                                        <i class="fas fa-quote-right"></i>
                                    </p>



                                </div>
                            </li>
                            <li>
                                <div class="testi-pos">
                                    <img src="{{ asset('front/images/t2.jpg') }}" alt="" class="img-fluid rounded-circle mb-3" />
                                    <h4>Mike Ogene</h4>
                                    <span>School Teacher</span>
                                </div>
                                <div class="testi-agile">
                                    <p>
                                        <i class="fas fa-quote-left"></i>I have been using Able Share SMS for about 2 years now and i can say its the smoothest platform
                                        I have ever seen, it is very easy to use and the customer service center is 100% attentive.
                                        <i class="fas fa-quote-right"></i>
                                    </p>

                                </div>
                            </li>
                            <li>
                                <div class="testi-pos">
                                    <img src="{{ asset('front/images/t3.jpg') }}" alt="" class="img-fluid rounded-circle mb-3" />
                                    <h4>Samuel Adetayou</h4>
                                    <span>Business Man</span>
                                </div>
                                <div class="testi-agile">

                                    <p>
                                        <i class="fas fa-quote-left"></i>I have been using Able Share SMS for about 2 years now and i can say its the smoothest platform
                                        I have ever seen, it is very easy to use and the customer service center is 100% attentive.
                                        <i class="fas fa-quote-right"></i>
                                    </p>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- //testimonials -->
        <!-- contact -->
        <div class="contact-wthree position-relative" id="contact">
            <span class="letter-02">c</span>
            <div class="container py-sm-5">
                <div class="row py-lg-5 py-4">
                    <div class="col-lg-4">
                        <div class="title-wthree">
                            <h3 class="agile-title">
                                contact
                            </h3>
                            <span></span>
                        </div>
                        <p>Donec mi nulla, auctor nec sem a, ornare auctor mi. Sed mi tortor, commodo a felis in, fringilla
                            tincidunt nulla. Vestibulum volutpat non eros ut vulpuuctor nec sem </p>
                        <div class="d-sm-flex">
                            <a class="btn btn-theme mt-lg-5 mt-3 agile-link-cnt scroll btn-change5" href="#contact" role="button">email us</a>
                            <a class="btn btn-theme mt-lg-5 mt-3 ml-sm-4 agile-link-cnt  scroll btn-change5" href="#footer">call us</a>
                        </div>
                    </div>
                    <div class="offset-2"></div>
                    <div class="col-lg-6 mt-lg-0 mt-5">
                        <!-- register form grid -->
                        <div class="register-top1">
                            <form action="#" method="get" class="register-wthree">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 d-md-flex align-items-end justify-content-end px-md-0">
                                            <label class="mb-0">
                                                <span class="fas fa-user"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <label>
                                                First name
                                            </label>
                                            <input class="form-control" type="text" placeholder="Johnson" name="email" required="">
                                        </div>
                                        <div class="col-md-5">
                                            <label>
                                                Last name
                                            </label>
                                            <input class="form-control" type="text" placeholder="Kc" name="email" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 d-md-flex align-items-end justify-content-end px-md-0">
                                            <label class="mb-0">
                                                <span class="fas fa-envelope-open"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <label>
                                                Email
                                            </label>
                                            <input class="form-control" type="email" placeholder="example@email.com" name="email" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 d-md-flex align-items-end justify-content-end px-md-0">
                                            <label class="mb-0">
                                                <span class="far fa-edit"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <label>
                                                Your message
                                            </label>
                                            <textarea placeholder="Type your message here" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-lg-5 mt-3">
                                    <div class="offset-2"></div>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-agile btn-block w-100">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--  //register form grid ends here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- //contact -->
        <!-- partners  -->

        <!-- //partners -->
        <!-- footer -->
        <footer id="footer" class="text-sm-left text-center">
            <div class="container py-4 py-sm-5">
                <h2>
                    <a class="navbar-brand text-white" href="index.html">
                    Able Share
                    </a>
                </h2>
                <div class="row py-sm-5 py-3">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <ul class="list-agileits">
                            <li>
                                <a href="index.html" class="nav-link">
                                    Home
                                </a>
                            </li>
                            <li class="my-2">
                                <a href="#register" class="nav-link scroll">
                                    Register
                                </a>
                            </li>
                            <li class="my-2">
                                <a href="#process" class="nav-link scroll">
                                    Process
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#partners" class="nav-link scroll ">
                                    Partners
                                </a>
                            </li>
                            <li>
                                <a href="#contact" class="nav-link scroll">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mt-sm-5">
                        <ul class="list-agileits">
                            <li>
                                <a href="#register" class="nav-link scroll">
                                    Register
                                </a>
                            </li>
                            <li class="my-2">
                                <a href="#" class="nav-link">
                                    Terms
                                </a>
                            </li>
                            <li class="my-2">
                                <a href="#" class="nav-link">
                                    License
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="offset-lg-5"></div>
                    <div class="col-lg-3 col-md-4 footer-end-grid mt-md-0 mt-sm-5">
                        <div class="fv3-contact">
                            <span class="fas fa-phone mr-2"></span>
                            <p class="d-inline">
                                111 22 3333
                            </p>
                        </div>
                        <div class="fv3-contact">
                            <span class="fas fa-mobile mr-2"></span>
                            <p class="d-inline">
                                111 22 3333
                            </p>
                        </div>
                        <div class="fv3-contact">
                            <span class="fas fa-envelope-open mr-2"></span>
                            <p class="d-inline">
                                <a href="mailto:example@email.com">info@example.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between footer-bottom-cpy">
                    <div class="cpy-right">
                        <p>© 2019 Able Share. All rights reserved | Design by
                            <a href="http://sabidac.org.ng" class="text-white"> Sabidac IT Solutions.</a>
                        </p>
                    </div>
                    <div class="social-icons pb-md-0 pb-4">
                        <ul class="social-iconsv2 agileinfo">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- //footer -->
    </div>
    <!-- login  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="text" class="form-control" placeholder=" " name="email" id="recipient-name" required="">
                            @error('email')
                                  <span class="invalid-feedback" role="alert">
                                        <strong style="color: #761b18;">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="password" id="password" required="">
                            @error('password')
                                  <span class="invalid-feedback" role="alert">
                                        <strong style="color: #761b18;">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Login">
                        </div>
                        <div class="row sub-w3l my-3">
                            <div class="col sub-agile">
                                <input type="checkbox" id="brand1" value="">
                                <label for="brand1" class="text-secondary">
                                    <span></span>Remember me?</label>
                            </div>
                            <div class="col forgot-w3l text-right">
                                <a href="#" class="text-secondary">Forgot Password?</a>
                            </div>
                        </div>
                        <!-- <p class="text-center dont-do">Don't have an account?
                            <a href="{{ route('login') }}" class="scroll text-dark font-weight-bold">
                                Register Now</a>
                        </p> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //login -->
    <!-- js -->
    <script src="{{ asset('front/js/jquery-2.2.3.min.js') }}"></script>
    <!-- //js -->
    <!-- script for password match -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- script for password match -->
    <!-- testimonials  Responsiveslides -->
    <script src="{{ asset('front/js/responsiveslides.min.js') }}"></script>
    <script>
        // You can also use"$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- //testimonials  Responsiveslides -->
    <!-- start-smooth-scrolling -->
    <script src="{{ asset('front/js/move-top.js') }}"></script>
    <script src="{{ asset('front/js/easing.js') }}"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="{{ asset('front/js/SmoothScroll.min.js') }}"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('front/js/bootstrap.js') }}"></script>
</body>

</html>
