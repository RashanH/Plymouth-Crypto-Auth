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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" media="all">

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
        <header class="theme-main-menu sticky-menu theme-menu-four">
            <div class="inner-content">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="logo order-lg-0"><a href="{{ url('') }}" class="d-block"><img
                                src="images/logo/logo_01.png" alt="" width="129"></a></div>

                    <div class="right-widget d-flex align-items-center ms-auto ms-lg-0 order-lg-3">

                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="req-demo-btn tran3s d-none d-lg-block">Dashboard</a>
                        @else
                        <a class="loginbtn_black" href="{{ route('login') }}">Log in</a>
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
                                    <div class="logo"><a href="{{ url('') }}"><img src="images/logo/logo_01.png" alt=""
                                                width="130"></a></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('') }}" role="button">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('pricing') }}" role="button">Pricing</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('faq') }}" role="button">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('docs') }}" role="button">Documentation</a>
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
				Theme Inner Banner
			============================================== 
			-->
        <div class="theme-inner-banner">
            <div class="container">
                <h2 class="intro-title text-center">Questions & Answers</h2>
            </div>
            <img src="images/shape/shape_38.svg" alt="" class="shapes shape-one">
            <img src="images/shape/shape_39.svg" alt="" class="shapes shape-two">
        </div> <!-- /.theme-inner-banner -->




        <!--
			=====================================================
				FAQ Section One
			=====================================================
			-->
        <div class="faq-section-one mb-150 lg-mt-80 lg-mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-10 col-xl-11 m-auto">
                        <div class="row">
                            <div class="col-xl-4 col-lg-3">
                                <ul class="faq-list-item style-none md-mb-60">
                                    <li class="active"><a href="#account">1. <span>Account</span></a></li>
                                    <li><a href="#payments">2. <span>Payments</span></a></li>
                                    <li><a href="#privacy">3. <span>Privacy</span></a></li>
                                </ul>
                            </div>

                            <div class="col-xl-8 col-lg-9">
                                <h3 id="account" class="faq-title">Accounts</h3>
                                <div class="accordion accordion-style-one" id="accordionOne">
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                What are the requirements for create a CryptFence account?
                                            </button>
                                        </div>
                                        <div id="collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                                            <div class="accordion-body">
                                                <p>Just your first name, last name and email are enough.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                How can I create an account?
                                            </button>
                                        </div>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
                                            <div class="accordion-body">
                                                <p>Please register your new account <a
                                                        href="{{ url('register') }}">here</a>. You may have to verify
                                                    your email address.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Can I delete my account by myself?
                                            </button>
                                        </div>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                            <div class="accordion-body">
                                                <p>Yes, you are. Please use <code>Account</code> section to delete your
                                                    account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 id="payments" class="faq-title">Payments</h3>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingSix">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseSix" aria-expanded="false"
                                                aria-controls="collapseSix">
                                                What are available Payment methods?
                                            </button>
                                        </div>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                            aria-labelledby="headingSix" data-bs-parent="#accordionOne">
                                            <div class="accordion-body">
                                                <p>We use Stripe as our exclusive payment gateway provider. We accept
                                                    credit/debit cards, bank debits, AliPay, ApplePay, Google Pay,
                                                    Microsoft Pay and GrabPay.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                aria-expanded="false" aria-controls="collapseSeven">
                                                Do you store my card information?
                                            </button>
                                        </div>
                                        <div id="collapseSeven" class="accordion-collapse collapse"
                                            aria-labelledby="headingSeven" data-bs-parent="#accordionOne">
                                            <div class="accordion-body">
                                                <p>No. We won't store your sensitive information. Payments are proceeded
                                                    by Stripe.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingEight">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseEight" aria-expanded="false"
                                                aria-controls="collapseEight">
                                                Can I get refund?
                                            </button>
                                        </div>
                                        <div id="collapseEight" class="accordion-collapse collapse show"
                                            aria-labelledby="headingEight" data-bs-parent="#accordionOne">
                                            <div class="accordion-body">
                                                <p>Yes. Please contact us via <a href="{{ url('contact') }}">contact</a>
                                                    form and let us know your problem. We are happy to issue a refund
                                                    after considering your problem.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 id="privacy" class="faq-title">Privacy</h3>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                Are you GDPR (General Data Protection Regulation) compliant?
                                            </button>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionOne">
                                            <div class="accordion-body">
                                                <p>We are GDPR-ready.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                Do you sell my data?
                                            </button>
                                        </div>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="headingFive" data-bs-parent="#accordionOne">
                                            <div class="accordion-body">
                                                <p>Nope, never. We do not share your information with any third-party.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div> <!-- /.container -->
        </div> <!-- /.faq-section-one -->



        <!-- 
			=============================================
				Fancy Short Banner Five
			============================================== 
			-->
        <div class="fancy-short-banner-five">
            <div class="container">
                <div class="bg-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-center text-lg-start" data-aos="fade-right">
                            <h3 class="pe-xxl-5 md-pb-20">Still having any query? Send us a message.</h3>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end" data-aos="fade-left">
                            <a href="{{ url('contact') }}" class="msg-btn tran3s">Send Us Message</a>
                        </div>
                    </div>
                </div> <!-- /.bg-wrapper -->
            </div> <!-- /.container -->
        </div> <!-- /.fancy-short-banner-five -->



        <!--
			=====================================================
				Footer
			=====================================================
			-->
        <div class="footer-style-four space-fix-one theme-basic-footer">
            <div class="container">
                <div class="inner-wrapper">
                    <div class="row">
                        <div class="col-lg-3 footer-intro mb-40">
                            <div class="logo"><a href="{{ url('') }}"><img src="images/logo/logo_01.png" alt=""
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
        </div> <!-- /.footer-style-four -->


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
