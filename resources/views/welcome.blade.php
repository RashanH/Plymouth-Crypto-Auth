<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <meta name="theme-color" content="#1E78FF">
    <meta name="msapplication-navbutton-color" content="#1E78FF">
    <meta name="apple-mobile-web-app-status-bar-style" content="#1E78FF">
    <link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all">

    <!-- Fix Internet Explorer ______________________________________-->
    <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="antialiased">
    <div class="main-page-wrapper">
        <!-- 
			=============================================
				Theme Main Menu
			============================================== 
			-->
        <header class="theme-main-menu sticky-menu theme-menu-three">
            <div class="inner-content">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="logo order-lg-0"><a href="{{ url('') }}" class="d-block"><img src="images/logo/logo_02.png"
                                alt="" width="129"></a></div>

                    <div class="right-widget d-flex align-items-center ms-auto ms-lg-0 order-lg-3">

                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="req-demo-btn tran3s d-none d-lg-block">Dashboard</a>
                        @else
                        <a class="loginbtn" href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="req-demo-btn tran3s d-none d-lg-block">Register</a>
                        @endif
                        @endauth
                        @endif


                    </div> <!-- /.right-widget -->

                    <nav class="navbar navbar-expand-lg order-lg-2">
                        <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="d-block d-lg-none">
                                    <div class="logo"><a href="{{ url('') }}"><img src="images/logo/logo_02.png" alt=""
                                                width="130"></a></div>
                                </li>
                                <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('') }}" role="button">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('pricing') }}" role="button">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('faq') }}" role="button">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('contact') }}" role="button">Contact</a>
                                </li>
                            </ul>
                            <!-- Mobile Content -->
                            <div class="mobile-content d-block d-lg-none">
                                <div class="d-flex flex-column align-items-center justify-content-center mt-70">
                                    <a href="{{ url('register') }}" class="req-demo-btn tran3s">Register</a>
                                </div>
                            </div> <!-- /.mobile-content -->
                        </div>
                    </nav>
                </div>
            </div> <!-- /.inner-content -->
        </header> <!-- /.theme-main-menu -->



        <!-- 
			=============================================
				Theme Hero Banner
			============================================== 
			-->
        <div class="hero-banner-three">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-md-6">
                        <h1 class="hero-heading">Next Gen<br>Cloud Licensing<br>System</h1>
                        <p class="text-lg mb-50 lg-mb-40">Delivering blazing fast &amp; secure licensing solution.</p>
                        <ul class="style-none button-group d-lg-flex align-items-center">
                            <li class="me-4"><a href="{{ url('pricing') }}" class="btn-one ripple-btn">See Pricing</a>
                            </li>
                            <li class="help-btn">Need any help? <a href="{{ url('contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- /.container -->
            <div class="illustration-holder sm-mt-50">
                <img src="images/assets/ils_07.svg" alt="" class="main-illustration transform-img-meta ms-auto">
                <img src="images/shape/shape_19.png" alt="" class="shapes shape-one">
            </div> <!-- /.illustration-holder -->
            <img src="images/shape/shape_18.svg" alt="" class="shapes cube-shape">
        </div> <!-- /.hero-banner-three -->




        <!-- 
			=============================================
				Feature Section Eight
			============================================== 
			-->
        <div class="fancy-feature-eight position-relative">
            <div class="container">
                <div class="row justify-content-center gx-xxl-5">
                    <div class="col-lg-4 col-sm-6 d-flex mb-30" data-aos="fade-up">
                        <div class="block-style-seven">
                            <div class="icon d-flex align-items-end"><img src="images/icon/icon_12.svg" alt=""></div>
                            <h5><a href="#">Secure Licenses</a></h5>
                            <p>Offers fully secure licensing features with the support of newest crypto algorithms.</p>
                     
                        </div> <!-- /.block-style-seven -->
                    </div>
                    <div class="col-lg-4 col-sm-6 d-flex mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="block-style-seven">
                            <div class="icon d-flex align-items-end"><img src="images/icon/icon_28.svg" alt=""></div>
                            <h5><a href="#">Cross-Language</a></h5>
                            <p>Provides libraries for common programming languages and a powerful API system.</p>
                        </div> <!-- /.block-style-seven -->
                    </div>
                    <div class="col-lg-4 d-flex mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="block-style-seven">
                            <div class="icon d-flex align-items-end"><img src="images/icon/icon_19.svg" alt=""></div>
                            <h5><a href="#">Customer Support</a></h5>
                            <p>User friendly support team, always waiting to help you with API integration and all other related services.</p>
                        </div> <!-- /.block-style-seven -->
                    </div>
                </div>
            </div> <!-- /.container -->
        </div> <!-- /.fancy-feature-eight -->

        <!-- 
			=============================================
				Feature Section Eleven
			============================================== 
			-->
        <div class="fancy-feature-eleven lg-mt-120">
            <div class="container">
                <div class="title-style-one white-vr text-center mb-55 lg-mb-30" data-aos="fade-up">
                    <h2 class="main-title">How It works</h2>
                    <p class="sub-title">Our advance license system work seamlesly, securely & smartly.</p>
                </div> <!-- /.title-style-one -->

                <div class="row">
                    <div class="col-xxl-11 m-auto">
                        <div class="row justify-content-center gx-xxl-5">
                            <div class="col-md-4 col-sm-6" data-aos="fade-right">
                                <div class="block-style-eight position-relative mt-50">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="images/icon/icon_21.svg" alt="">
                                        <div class="num">1</div>
                                    </div>
                                    <h5>Create a product and<br>get a pub key</h5>
                                </div> <!-- /.block-style-eight -->
                            </div>
                            <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="block-style-eight position-relative mt-50 shape-arrow">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="images/icon/icon_22.svg" alt="">
                                        <div class="num">2</div>
                                    </div>
                                    <h5>Implement pub key<br>in your application</h5>
                                </div> <!-- /.block-style-eight -->
                            </div>
                            <div class="col-md-4 col-sm-6" data-aos="fade-left" data-aos-delay="200">
                                <div class="block-style-eight position-relative mt-50">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="images/icon/icon_23.svg" alt="">
                                        <div class="num">3</div>
                                    </div>
                                    <h5>Manage licenses and<br>plan ahead</h5>
                                </div> <!-- /.block-style-eight -->
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.container -->
            <img src="images/shape/shape_20.svg" alt="" class="shapes shape-one">
            <img src="images/shape/shape_21.svg" alt="" class="shapes shape-two">
            <img src="images/shape/shape_22.png" alt="" class="shapes shape-three">
            <img src="images/shape/shape_23.png" alt="" class="shapes shape-four">
        </div> <!-- /.fancy-feature-eleven -->


        <!-- 
			=============================================
				Feature Section Nine
			============================================== 
			-->
        <div class="fancy-feature-nine mt-190 lg-mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 col-lg-6 ms-auto order-lg-last">
                        <div class="block-style-two md-mb-50" data-aos="fade-left">
                            <div class="title-style-one">
                                <div class="sc-title-four">What is CryptFence</div>
                                <h2 class="main-title">We offer cloud licenses.</h2>
                            </div> <!-- /.title-style-one -->
                            <ul class="nav nav-tabs justify-content-between" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#sp1"
                                        type="button" role="tab">Licenses</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sp2" type="button"
                                        role="tab">Integration</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sp3" type="button"
                                        role="tab">Dashboard</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sp4" type="button"
                                        role="tab">Support</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="sp1">
                                    <p class="pt-10 pb-10">Our licenses are secured with modern RSA and AES algorithms.</p>
                                    <ul class="style-none list-item">
                                        <li>RSA &amp; AES-256-CBC crypto licenses.</li>
                                        <li>Securely stored on cloud.</li>
                                        <li>25 character alphanumeric keys.</li>
                                        <li>Supports offline licenses (conditions apply)</li>
                                    </ul>
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="sp2">
                                    <p class="pt-10 pb-10">We already have libraries for common programming languages. Also you can use the API and validate from any language.</p>
                                    <ul class="style-none list-item">
                                        <li>Powerful API system with rate limits.</li>
                                        <li>Libraries for commom languages.</li>
                                        <li>Lightning fast and 99.9% uptime.</li>
                                    </ul>
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="sp3">
                                    <p class="pt-10 pb-10">Our web dashboard allows you to generate and manage licenses. Expecting provide API support soon.</p>
                                    <ul class="style-none list-item">
                                        <li>Manage products, keys &amp; customers.</li>
                                        <li>Friendly interface.</li>
                                        <li>Extra safely with 2FA.</li>
                                    </ul>
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="sp4">
                                    <p class="pt-10 pb-10">Customer service and customer satisfaction is our top priority.</p>
                                    <ul class="style-none list-item">
                                        <li>Friendly support.</li>
                                        <li>24/7 with fast replies.</li>
                                        <li>Personalized solutions.</li>
                                    </ul>
                                </div> <!-- /.tab-pane -->
                            </div> <!-- /.tab-content -->

                        </div> <!-- /.block-style-two -->
                    </div>

                    <div class="col-lg-6 order-lg-first text-center text-lg-start" data-aos="fade-right">
                        <div class="illustration-holder d-inline-block ms-xxl-5 mt-40 lg-mt-10">
                            <img src="images/assets/ils_08.svg" alt="" class="transform-img-meta">
                            <img src="images/assets/ils_08_1.svg" alt="" class="shapes shape-one">
                        </div>
                    </div>
                </div>
            </div> <!-- /.container -->
        </div> <!-- /.fancy-feature-nine -->


        <!-- 
			=============================================
				Feature Section Twelve
			============================================== 
			-->
        <div class="fancy-feature-twelve mt-170 lg-mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-md-6 order-md-last">
                        <div class="block-style-nine pt-30 sm-pt-10">
                            <div class="title-style-one pb-10" data-aos="fade-up">
                                <div class="sc-title-four">WHY CHOOSE US</div>
                                <h2 class="main-title">Why choose us for your business.</h2>
                            </div> <!-- /.title-style-one -->
                            <ul class="style-none list-item">
                                <li data-aos="fade-up">Affordable pricing plans for both individuals and organizations. We do not charge based on # of users.</li>
                                <li data-aos="fade-up" data-aos-delay="100">Easy integration, a detailed documentation and 24/7 customer support available.</li>
                                <li data-aos="fade-up" data-aos-delay="200">We perform frequent scans on our systems, which means your licenses and data are secure with us.</li>
                            </ul>
                        </div> <!-- /.block-style-nine -->
                    </div>
                    <div class="col-xl-7 col-md-6 order-md-first" data-aos="fade-right">
                        <div class="illustration-holder position-relative d-inline-block ms-5 sm-mt-30">
                            <img src="images/assets/ils_09.svg" alt="" class="transform-img-meta">
                            <div class="card-one shapes d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="bi bi-check-lg"></i></div>
                                <h6>A++ Performance</h6>
                            </div> <!-- /.card-one -->
                            <div class="card-two shapes text-center">
                                <div class="icon"><i class="bi bi-check-lg"></i></div>
                                <div class="main-count"><span class="counter">5</span></div>
                                <div class="info">Star Rating</div>
                                <ul class="style-none d-flex justify-content-center rating">
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                </ul>
                            </div> <!-- /.card-two -->
                        </div>
                    </div>
                </div>
            </div>
            <img src="images/shape/shape_25.svg" alt="" class="shapes bg-shape">
        </div> <!-- /.fancy-feature-twelve -->


        <!--
			=====================================================
				Feature Section Seven
			=====================================================
			-->
        <div class="fancy-feature-seven mt-140 lg-mt-50 sm-mt-20">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="block-style-five md-pb-50" data-aos="fade-right">
                            <div class="title-style-one">
                                <div class="sc-title-three">Frequently Asked Question</div>
                                <h2 class="main-title">Any Questions? Find here.</h2>
                            </div> <!-- /.title-style-one -->
                            <p class="pt-10 pb-15">Don’t find your answer here? just check our FAQ section
                            </p>
                            <a href="{{ url('faq') }}" class="btn-five ripple-btn">See our FAQ</a>
                        </div> <!-- /.block-style-five -->
                    </div>

                    <div class="col-lg-7 col-lg-6 ms-auto" data-aos="fade-left">
                        <div class="accordion accordion-style-one" id="accordionOne">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        What is web hosting?
                                    </button>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>They not only understand what I say but read between the lines and also give
                                            me ideas of my own. AI technology is perfect for best business solutions.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How do you weigh different criteria in your process?
                                    </button>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>They not only understand what I say but read between the lines and also give
                                            me ideas of my own. AI technology is perfect for best business solutions.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        What can I use to build my website?
                                    </button>
                                </div>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>They not only understand what I say but read between the lines and also give
                                            me ideas of my own. AI technology is perfect for best business solutions.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour">
                                        If I already have a website, can I transfer it to your web hosting?
                                    </button>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse show"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>They not only understand what I say but read between the lines and also give
                                            me ideas of my own. AI technology is perfect for best business solutions.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        How can I accept credit cards online?
                                    </button>
                                </div>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>They not only understand what I say but read between the lines and also give
                                            me ideas of my own. AI technology is perfect for best business solutions.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.container -->
            <img src="images/shape/shape_13.svg" alt="" class="shapes shape-one">
            <img src="images/shape/shape_14.svg" alt="" class="shapes shape-two">
            <img src="images/shape/shape_15.svg" alt="" class="shapes shape-three">
        </div> <!-- /.fancy-feature-seven -->


        <!-- 
			=============================================
				Fancy Short Banner Three
			============================================== 
			-->
        <div class="fancy-short-banner-three position-relative mt-160 lg-mt-80">
            <div class="container">
                <div class="bg-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-8 m-auto" data-aos="fade-up">
                            <div class="title-style-one text-center white-vr mb-30" data-aos="fade-up">
                                <h2 class="main-title">Get Ready to Started. It’s Fast & very easy</h2>
                            </div> <!-- /.title-style-one -->
                            <a href="{{ url('register') }}" class="btn-six ripple-btn">Get Started <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div> <!-- /.bg-wrapper -->
            </div> <!-- /.container -->
        </div> <!-- /.fancy-short-banner-three -->

        <!--
			=====================================================
				Address Section One
			=====================================================
			-->
        <div class="address-section-one">
            <div class="container">
                <div class="inner-content bg-white" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-md-6 d-flex">
                            <div class="address-block-one d-flex border-right">
                                <div class="icon"><img src="images/icon/icon_06.svg" alt=""></div>
                                <div class="text-meta">
                                    <h4 class="title">Our Address</h4>
                                    <p>9169 W State St #2028, 83714<br>Garden City, Idaho</p>
                                </div> <!-- /.text-meta -->
                            </div> <!-- /.address-block-one -->
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="address-block-one d-flex">
                                <div class="icon"><img src="images/icon/icon_07.svg" alt=""></div>
                                <div class="text-meta">
                                    <h4 class="title">Contact Info</h4>
                                    <p>Open a chat or give us call at <br><a href="tel:+14356605999">+1 (435) 660-5999</a></p>
                                </div> <!-- /.text-meta -->
                            </div> <!-- /.address-block-one -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.address-section-one -->


        <!--
			=====================================================
				Footer
			=====================================================
			-->
        <div class="footer-style-three theme-basic-footer">
            <img src="images/shape/shape_30.png" alt="" class="shapes shape-one">
            <img src="images/shape/shape_28.png" alt="" class="shapes shape-two">
            <img src="images/shape/shape_29.png" alt="" class="shapes shape-three">
            <div class="container">
                <div class="inner-wrapper">
                    <div class="row">
                        <div class="col-lg-3 footer-intro mb-40">
                            <div class="logo"><a href="{{ url('') }}"><img src="images/logo/logo_02.png" alt=""
                                        width="129"></a></div>
                            <p>We support to for your licensing requirements.</p>
                            <ul class="d-flex social-icon style-none">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                            <h5 class="footer-title">Home Links</h5>
                            <ul class="footer-nav-link style-none">
                                <li><a href="{{ url('') }}">Home</a></li>
                                <li><a href="{{ url('docs') }}">API documentation</a></li>
                                <li><a href="{{ url('pricing') }}">Pricing</a></li>
                                <li><a href="{{ url('faq') }}">FAQ</a></li>
                                <li><a href="{{ url('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-6 mb-30">
                            <h5 class="footer-title">Dashboard Links</h5>
                            <ul class="footer-nav-link style-none">
                                <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ url('products') }}">Manage products</a></li>
                                <li><a href="{{ url('customers') }}">Manage customers</a></li>
                                <li><a href="{{ url('billing') }}">Billing</a></li>
                                <li><a href="{{ url('user/profile') }}">Account settings</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="bottom-footer">
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <ul class="order-lg-1 pb-15 d-flex justify-content-center footer-nav style-none">
                             <!--   <li><a href="#">Privacy &amp; Terms.</a></li> -->
                                <li><a href="{{ url('faq') }}">FAQ</a></li>
                                <li><a href="{{ url('contact') }}">Contact Us</a></li>
                            </ul>
                            <p class="copyright text-center order-lg-0 pb-15">Copyright @2022 CryptFence Solutions.</p>
                        </div>
                    </div>
                </div> <!-- /.inner-wrapper -->
            </div>
        </div> <!-- /.footer-style-three -->


        <button class="scroll-top">
            <i class="bi bi-arrow-up-short"></i>
        </button>




    </div>


    <!-- Optional JavaScript _____________________________  -->
    <script src="{{ asset('vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/aos-next/dist/aos.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

</body>

</html>
