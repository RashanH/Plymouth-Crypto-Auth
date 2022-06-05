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
                    <div class="logo order-lg-0"><a href="{{ url('') }}" class="d-block"><img src="images/logo/logo_01.png"
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
                                    <div class="logo"><a href="{{ url('') }}"><img src="images/logo/logo_01.png" alt=""
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


        <div class="pricing-section-one mt-130 lg-mt-110">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-xxl-7 col-xl-8 col-lg-7 col-md-9 m-auto">
                        <div class="title-style-one text-center">
                            <h2 class="main-title">Solo, agency or team? We’ve got you covered.</h2>
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
                                        <div class="pack-name">Standard</div>
                                        <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                            <div class="price"><sup>$</sup>9.99</div>
                                            <div>
                                                <span>Monthly membership</span>
                                                <em>Starting at $9.99/mo with </em>
                                            </div>
                                        </div> <!-- /.top-banner -->
                                        <ul class="pr-feature style-none">
                                            <li>✔ Upto 25 products</li>
                                            <li>✔ Unlimited keys</li>
                                            <li>✔ Unlimited customers</li>
                                            <li>✔ Fully secure licenses</li>
                                            <li>✔ 24/7 personalized customer support</li>
                                        </ul>
                                        <a href="{{ url('billing') }}" class="trial-button">Try us without risk. <span>Choose plan <i class="fas fa-chevron-right"></i></span> </a>
                                    </div> <!-- /.pr-table-wrapper -->
                                </div>
                                <div class="col-md-6">
                                    <div class="pr-table-wrapper">
                                        <div class="pack-name">Premium</div>
                                        <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                            <div class="price"><sup>$</sup>24.99</div>
                                            <div>
                                                <span>Monthly membership</span>
                                                <em>Starting at $24.99/mo with </em>
                                            </div>
                                        </div> <!-- /.top-banner -->
                                        <ul class="pr-feature style-none">
                                            <li>✔ Unlimited products</li>
                                            <li>✔ Unlimited keys</li>
                                            <li>✔ Unlimited customers</li>
                                            <li>✔ Fully secure licenses</li>
                                            <li>✔ 24/7 personalized customer support</li>
                                        </ul>
                                        <a href="{{ url('billing') }}" class="trial-button">Try us without risk. <span>Choose plan <i class="fas fa-chevron-right"></i></span> </a>
                                    </div> <!-- /.pr-table-wrapper -->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="year">
                              <div class="row gx-xxl-5">
                                <div class="col-md-6">
                                    <div class="pr-table-wrapper active md-mb-30">
                                        <div class="pack-name">Standard</div>
                                        <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                            <div class="price"><sup>$</sup>99.99</div>
                                            <div>
                                                <span>Yearly membership</span>
                                                <em>Starting at $8.33/mo with </em>
                                            </div>
                                        </div> <!-- /.top-banner -->
                                        <ul class="pr-feature style-none tickboxes">
                                            <li>✔ Upto 25 products</li>
                                            <li>✔ Unlimited keys</li>
                                            <li>✔ Unlimited customers</li>
                                            <li>✔ Fully secure licenses</li>
                                            <li>✔ 24/7 personalized customer support</li>
                                        </ul>
                                        <a href="{{ url('billing') }}" class="trial-button">Try us without risk. <span>Choose plan <i class="fas fa-chevron-right"></i></span> </a>
                                    </div> <!-- /.pr-table-wrapper -->
                                </div>
                                <div class="col-md-6">
                                    <div class="pr-table-wrapper">
                                        <div class="pack-name">Premium</div>
                                       <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                            <div class="price"><sup>$</sup>249.99</div>
                                            <div>
                                                <span>Yearly membership</span>
                                                <em>Starting at $21/mo with </em>
                                            </div>
                                        </div> <!-- /.top-banner -->
                                        <ul class="pr-feature style-none">
                                            <li>✔ Unlimited products</li>
                                            <li>✔ Unlimited keys</li>
                                            <li>✔ Unlimited customers</li>
                                            <li>✔ Fully secure licenses</li>
                                            <li>✔ 24/7 personalized customer support</li>
                                        </ul>
                                        <a href="{{ url('billing') }}" class="trial-button">Try us without risk. <span>Choose plan <i class="fas fa-chevron-right"></i></span> </a>
                                    </div> <!-- /.pr-table-wrapper -->
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.tab-content -->

                    <div class="msg-note mt-80 lg-mt-50" data-aos="fade-up">If you Need any Custom or others Pricing System. <br> Please <a href="{{ url('contact') }}">Send Message</a></div>
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
