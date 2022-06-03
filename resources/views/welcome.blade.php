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
                    <div class="logo order-lg-0"><a href="index.html" class="d-block"><img src="images/logo/logo_02.png"
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
                                    <div class="logo"><a href="index.html"><img src="images/logo/logo_02.png" alt=""
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
                        <h1 class="hero-heading">Next Level Client Support with lily.</h1>
                        <p class="text-lg mb-50 lg-mb-40">CryptFence delivered blazing fast, striking ai solution</p>
                        <ul class="style-none button-group d-lg-flex align-items-center">
                            <li class="me-4"><a href="contact-us.html" class="btn-one ripple-btn">Start Free Trial</a>
                            </li>
                            <li class="help-btn">Need any help? <a href="contact-us.html">Contact us</a></li>
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
                            <div class="icon d-flex align-items-end"><img src="images/icon/icon_17.svg" alt=""></div>
                            <h5><a href="service-details-V1.html">Data Science</a></h5>
                            <p>Convert data noise to intelligent insights for quis competitive differentiation.</p>
                            <a href="service-details-V1.html" class="tran3s more-btn"><img src="images/icon/icon_20.svg"
                                    alt=""></a>
                        </div> <!-- /.block-style-seven -->
                    </div>
                    <div class="col-lg-4 col-sm-6 d-flex mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="block-style-seven">
                            <div class="icon d-flex align-items-end"><img src="images/icon/icon_18.svg" alt=""></div>
                            <h5><a href="service-details-V1.html">Machine Learning</a></h5>
                            <p>Convert data noise to intelligent insights for quis competitive differentiation.</p>
                            <a href="service-details-V1.html" class="tran3s more-btn"><img src="images/icon/icon_20.svg"
                                    alt=""></a>
                        </div> <!-- /.block-style-seven -->
                    </div>
                    <div class="col-lg-4 d-flex mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="block-style-seven">
                            <div class="icon d-flex align-items-end"><img src="images/icon/icon_19.svg" alt=""></div>
                            <h5><a href="service-details-V1.html">Customer Support</a></h5>
                            <p>Convert data noise to intelligent insights for quis competitive differentiation.</p>
                            <a href="service-details-V1.html" class="tran3s more-btn"><img src="images/icon/icon_20.svg"
                                    alt=""></a>
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
        <div class="fancy-feature-eleven mt-225 lg-mt-120">
            <div class="container">
                <div class="title-style-one white-vr text-center mb-55 lg-mb-30" data-aos="fade-up">
                    <h2 class="main-title">How It works</h2>
                    <p class="sub-title">Our advance AI system work seamlesly & smartly.</p>
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
                                    <h5>Identify the probelm <br> with ai</h5>
                                </div> <!-- /.block-style-eight -->
                            </div>
                            <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="block-style-eight position-relative mt-50 shape-arrow">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="images/icon/icon_22.svg" alt="">
                                        <div class="num">2</div>
                                    </div>
                                    <h5>Collect data with our <br> advance ai.</h5>
                                </div> <!-- /.block-style-eight -->
                            </div>
                            <div class="col-md-4 col-sm-6" data-aos="fade-left" data-aos-delay="200">
                                <div class="block-style-eight position-relative mt-50">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="images/icon/icon_23.svg" alt="">
                                        <div class="num">3</div>
                                    </div>
                                    <h5>Deliver Accurate data <br> solution.</h5>
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
                                <div class="sc-title-four">What is Chatbot</div>
                                <h2 class="main-title">Customer service by our chatbot.</h2>
                            </div> <!-- /.title-style-one -->
                            <ul class="nav nav-tabs justify-content-between" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#sp1"
                                        type="button" role="tab">Speech</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sp2" type="button"
                                        role="tab">Auto Text</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sp3" type="button"
                                        role="tab">Q&A</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sp4" type="button"
                                        role="tab">Generate Leads</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="sp1">
                                    <p class="pt-10 pb-10">Save web pages (without the ads) and mark them up with
                                        arrows, highlights, and text.</p>
                                    <ul class="style-none list-item">
                                        <li>Various analysis options.</li>
                                        <li>Page Load (time, size, number of requests).</li>
                                        <li>Big data analysis.</li>
                                    </ul>
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="sp2">
                                    <p class="pt-10 pb-10">CryptFence is data science, machine learning and artificial
                                        intelligence provide business solution.</p>
                                    <ul class="style-none list-item">
                                        <li>Page Load (time, size, number of requests).</li>
                                        <li>Various analysis options.</li>
                                        <li>Big data analysis.</li>
                                    </ul>
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="sp3">
                                    <p class="pt-10 pb-10">Save web pages (without the ads) and mark them up with
                                        arrows, highlights, and text.</p>
                                    <ul class="style-none list-item">
                                        <li>Various analysis options.</li>
                                        <li>Page Load (time, size, number of requests).</li>
                                        <li>Big data analysis.</li>
                                    </ul>
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="sp4">
                                    <p class="pt-10 pb-10">CryptFence is data science, machine learning and artificial
                                        intelligence provide business solution.</p>
                                    <ul class="style-none list-item">
                                        <li>Page Load (time, size, number of requests).</li>
                                        <li>Various analysis options.</li>
                                        <li>Big data analysis.</li>
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
                                <li data-aos="fade-up">Learn content by interacting with an expert lesson or watching a
                                    video.</li>
                                <li data-aos="fade-up" data-aos-delay="100">Practice what you learned on realistic SAT
                                    test questions.</li>
                                <li data-aos="fade-up" data-aos-delay="200">Review your practice questions and learn how
                                    to improve.</li>
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
                                <div class="main-count"><span class="counter">20</span>k</div>
                                <div class="info">5 Start Rating</div>
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
                                <div class="sc-title-three">Questions & Answers</div>
                                <h2 class="main-title">Any Questions? Find here.</h2>
                            </div> <!-- /.title-style-one -->
                            <p class="pt-10 pb-15">Don’t find your answer here? just send us a message for any query.
                            </p>
                            <a href="contact-us.html" class="btn-five ripple-btn">Contact us</a>
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
                                <h2 class="main-title">Get Ready to Started It’s Fast, Free & very easy</h2>
                            </div> <!-- /.title-style-one -->
                            <a href="contact-us.html" class="btn-six ripple-btn">Get Started <i
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
                                    <p>1012 Pebda Parkway, Mirpur 2 <br>Dhaka, Bangladesh</p>
                                </div> <!-- /.text-meta -->
                            </div> <!-- /.address-block-one -->
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="address-block-one d-flex">
                                <div class="icon"><img src="images/icon/icon_07.svg" alt=""></div>
                                <div class="text-meta">
                                    <h4 class="title">Contact Info</h4>
                                    <p>Open a chat or give us call at <br><a href="#">310.841.5500</a></p>
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
                            <div class="logo"><a href="index.html"><img src="images/logo/logo_02.png" alt=""
                                        width="129"></a></div>
                            <p>We will assist you in becoming more successful.</p>
                            <ul class="d-flex social-icon style-none">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 mb-30">
                            <h5 class="footer-title">Links</h5>
                            <ul class="footer-nav-link style-none">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="about-us2.html">About us</a></li>
                                <li><a href="service-V1.html">Service</a></li>
                                <li><a href="blog-V1.html">Blog</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-2 col-md-3 col-sm-6 mb-30">
                            <h5 class="footer-title">Legal</h5>
                            <ul class="footer-nav-link style-none">
                                <li><a href="faq.html">Terms of use</a></li>
                                <li><a href="faq.html">Terms & conditions</a></li>
                                <li><a href="faq.html">Privacy policy</a></li>
                                <li><a href="faq.html">Cookie policy</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-6 mb-30">
                            <div class="newsletter ps-xl-5">
                                <h5 class="footer-title">Subscribe </h5>
                                <p>Join over <span>68,000</span> people getting our emails</p>
                                <form action="#">
                                    <input type="email" placeholder="Enter your email">
                                    <button>Sign Up</button>
                                </form>
                                <div class="info">We only send interesting and relevant emails.</div>
                            </div> <!-- /.newsletter -->
                        </div>
                    </div>

                    <div class="bottom-footer">
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <ul class="order-lg-1 pb-15 d-flex justify-content-center footer-nav style-none">
                                <li><a href="faq.html">Privacy &amp; Terms.</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                            <p class="copyright text-center order-lg-0 pb-15">Copyright @2022 CryptFence inc.</p>
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
