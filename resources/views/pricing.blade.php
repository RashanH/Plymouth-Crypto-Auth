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
        <header class="theme-main-menu sticky-menu theme-menu-four">
            <div class="inner-content">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="logo order-lg-0"><a href="{{ url('') }}" class="d-block"><img src="images/logo/logo_02.png"
                                alt="" width="129"></a></div>

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
                                    <div class="logo"><a href="{{ url('') }}"><img src="images/logo/logo_02.png" alt=""
                                                width="130"></a></div>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ url('') }}" role="button">Home</a>
                                </li>
                                <li class="nav-item active">
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


        <div class="pricing-section-one mt-130 lg-mt-110">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-xxl-7 col-xl-8 col-lg-7 col-md-9 m-auto">
                        <div class="title-style-one text-center">
                            <h2 class="main-title">Solo, Agency or Team? We’ve got you Covered</h2>
                        </div> <!-- /.title-style-one -->
                    </div>
                </div>

                <ul class="nav nav-tabs justify-content-center pricing-nav-one" role="tablist">
                      <li class="nav-item" role="presentation">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#month" type="button" role="tab">Monthly</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#year" type="button" role="tab">Yearly</button>
                      </li>
                </ul>
            </div> <!-- /.container -->

            <div class="pricing-table-area-one" data-aos="fade-up" data-aos-delay="100">
                <div class="container">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="month">
                              <div class="row gx-xxl-5">
                                <div class="col-md-6">
                                    <div class="pr-table-wrapper active md-mb-30">
                                        <div class="pack-name">Business</div>
                                        <div class="pack-details">For individuals and teams. Get <span>1 year <br> premium market access</span></div>
                                        <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                            <div class="price"><sup>$</sup>75</div>
                                            <div>
                                                <span>Monthly membership</span>
                                                <em>Starting at $75/mo with </em>
                                            </div>
                                        </div> <!-- /.top-banner -->
                                        <ul class="pr-feature style-none">
                                            <li>Unlimited campaigns</li>
                                            <li>Push Notifications</li>
                                            <li>Team fundraising</li>
                                        </ul>
                                        <a href="#" class="trial-button">Try us without risk. <span>Choose plan <i class="fas fa-chevron-right"></i></span> </a>
                                    </div> <!-- /.pr-table-wrapper -->
                                </div>
                                <div class="col-md-6">
                                    <div class="pr-table-wrapper">
                                        <div class="pack-name">Agency</div>
                                        <div class="pack-details">For big agency & teams. Get <span>1 year <br> premium market access</span></div>
                                        <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                            <div class="price"><sup>$</sup>99</div>
                                            <div>
                                                <span>Monthly membership</span>
                                                <em>Starting at $99/mo with </em>
                                            </div>
                                        </div> <!-- /.top-banner -->
                                        <ul class="pr-feature style-none">
                                            <li>Unlimited campaigns</li>
                                            <li>Push Notifications</li>
                                            <li>Team fundraising</li>
                                        </ul>
                                        <a href="#" class="trial-button">Try us without risk. <span>Choose plan <i class="fas fa-chevron-right"></i></span> </a>
                                    </div> <!-- /.pr-table-wrapper -->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="year">
                              <div class="row gx-xxl-5">
                                <div class="col-md-6">
                                    <div class="pr-table-wrapper active md-mb-30">
                                        <div class="pack-name">Business</div>
                                        <div class="pack-details">For individuals and teams. Get <span>2 year <br> premium market access</span></div>
                                        <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                            <div class="price"><sup>$</sup>69</div>
                                            <div>
                                                <span>Yearly membership</span>
                                                <em>Starting at $69/mo with </em>
                                            </div>
                                        </div> <!-- /.top-banner -->
                                        <ul class="pr-feature style-none">
                                            <li>Unlimited campaigns</li>
                                            <li>Push Notifications</li>
                                            <li>Team fundraising</li>
                                        </ul>
                                        <a href="#" class="trial-button">Try us without risk. <span>Choose plan <i class="fas fa-chevron-right"></i></span> </a>
                                    </div> <!-- /.pr-table-wrapper -->
                                </div>
                                <div class="col-md-6">
                                    <div class="pr-table-wrapper">
                                        <div class="pack-name">Agency</div>
                                        <div class="pack-details">For big agency & teams. Get <span>2 year <br> premium market access</span></div>
                                        <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                            <div class="price"><sup>$</sup>97</div>
                                            <div>
                                                <span>Yearly membership</span>
                                                <em>Starting at $97/mo with </em>
                                            </div>
                                        </div> <!-- /.top-banner -->
                                        <ul class="pr-feature style-none">
                                            <li>Unlimited campaigns</li>
                                            <li>Push Notifications</li>
                                            <li>Team fundraising</li>
                                        </ul>
                                        <a href="#" class="trial-button">Try us without risk. <span>Choose plan <i class="fas fa-chevron-right"></i></span> </a>
                                    </div> <!-- /.pr-table-wrapper -->
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.tab-content -->

                    <div class="msg-note mt-80 lg-mt-50" data-aos="fade-up">If you Need any Custom or others Pricing System. <br> Please <a href="contact-us.html">Send Message</a></div>
                </div>
            </div> <!-- /.pricing-table-area-one -->
        </div> <!-- /.pricing-section-one -->
        

			<!--
			=====================================================
				Footer
			=====================================================
			-->
			<div class="footer-style-four space-fix-one theme-basic-footer">
				<div class="container">
					<div class="inner-wrapper">
						<div class="row">
							<div class="col-lg-4 footer-intro mb-40">
								<div class="logo"><a href="index.html"><img src="images/logo/logo_01.png" alt="" width="130"></a></div>
								<p>In this class, you will learn about the most effective machine learning techniques, and gain practice implementing them.</p>
								<ul class="d-flex social-icon style-none">
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
							</div>
							<div class="col-lg-2 col-sm-4 ms-auto mb-30">
								<h5 class="footer-title">Links</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="index.html">Home</a></li>
									<li><a href="pricing.html">Pricing</a></li>
									<li><a href="about-us2.html">About us</a></li>
									<li><a href="service-V1.html">Service</a></li>
									<li><a href="blog-V1.html">Blog</a></li>
								</ul>
							</div>
							<div class="col-lg-3 col-sm-4 mb-30">
								<h5 class="footer-title">Services</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="service-details-V1.html">Artificial Intelligence</a></li>
									<li><a href="service-details-V1.html">Data Analytics</a></li>
									<li><a href="service-details-V1.html">Data Visualization</a></li>
									<li><a href="service-details-V1.html">Deep Learning</a></li>
									<li><a href="service-details-V1.html">Statistical Modeling</a></li>
								</ul>
							</div>
							<div class="col-xl-2 col-lg-3 col-sm-4 mb-30">
								<h5 class="footer-title">Legal</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="faq.html">Terms of use</a></li>
									<li><a href="faq.html">Terms & conditions</a></li>
									<li><a href="faq.html">Privacy policy</a></li>
									<li><a href="faq.html">Cookie policy</a></li>
								</ul>
							</div>
						</div>

						<div class="bottom-footer">
							<div class="d-lg-flex justify-content-between align-items-center">
								<ul class="order-lg-1 pb-15 d-flex justify-content-center footer-nav style-none">
									<li><a href="faq.html">Privacy &amp; Terms.</a></li>
									<li><a href="faq.html">FAQ</a></li>
									<li><a href="contact-us.html">Contact Us</a></li>
								</ul>
								<p class="copyright text-center order-lg-0 pb-15">Copyright @2022 sinco inc.</p>
							</div>
						</div>
					</div> <!-- /.inner-wrapper -->
				</div>
			</div> <!-- /.footer-style-four -->


			<button class="scroll-top">
				<i class="bi bi-arrow-up-short"></i>
			</button>
			
        



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