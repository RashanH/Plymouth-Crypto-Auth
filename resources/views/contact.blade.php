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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('pricing') }}" role="button">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('faq') }}" role="button">FAQ</a>
                                </li>
                                <li class="nav-item active">
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
					<h2 class="intro-title text-center">Get in Touch</h2>
				</div>
				<img src="images/shape/shape_38.svg" alt="" class="shapes shape-one">
				<img src="images/shape/shape_39.svg" alt="" class="shapes shape-two">
			</div> <!-- /.theme-inner-banner -->

			
			

			<!-- 
			=============================================
				Contact Section One
			============================================== 
			-->
			<div class="contact-section-one mb-170 lg-mb-120">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="address-block-two text-center mb-40 sm-mb-20">
								<div class="icon d-flex align-items-center justify-content-center m-auto"><img src="images/icon/icon_17.svg" alt=""></div>
								<h5 class="title">Our Address</h5>
								<p>1012 Pebda Parkway, Mirpur 2 <br>Dhaka, Bangladesh</p>
							</div> <!-- /.address-block-two -->
						</div>
						<div class="col-md-4">
							<div class="address-block-two text-center mb-40 sm-mb-20">
								<div class="icon d-flex align-items-center justify-content-center m-auto"><img src="images/icon/icon_18.svg" alt=""></div>
								<h5 class="title">Contact Info</h5>
								<p>Open a chat or give us call at <br><a href="tel:310.841.5500" class="call">310.841.5500</a></p>
							</div> <!-- /.address-block-two -->
						</div>
						<div class="col-md-4">
							<div class="address-block-two text-center mb-40 sm-mb-20">
								<div class="icon d-flex align-items-center justify-content-center m-auto"><img src="images/icon/icon_19.svg" alt=""></div>
								<h5 class="title">Live Support</h5>
								<p>live chat service <br><a href="#" class="webaddress">www.sincochat.com</a></p>
							</div> <!-- /.address-block-two -->
						</div>
					</div>
				</div>

				<div class="mt-100 lg-mt-70">
					<div class="container">
						<div class="row gx-xxl-5">
							<div class="col-lg-6 d-flex order-lg-last">
								<div class="form-style-one">
									<h3 class="form-title pb-40 lg-pb-20">Send Message.</h3>

                                    
    @if ($message = Session::get('success'))
    <div class="py-5 px-6 mb-4 mt-4 text-base" role="alert" style="background:#caffdf;">
        {!! $message !!}
    </div>
    @endif
    @if ($errors->any())
    <div class="py-5 px-6 mb-4 mt-4 text-base" role="alert" style="background:#ffcaca;">
        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
    </div>
    @endif
    
									<form method="POST" action="{{ route('contact') }}" id="contact-form"  data-toggle="validator">
                                        @csrf
										<div class="messages"></div>
										<div class="row controls">
											<div class="col-12">
												<div class="input-group-meta form-group mb-30">
													<label>Name*</label>
													<input type="text" placeholder="Rashed Kabir" name="name" required="required" data-error="Name is required.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
											
											<div class="col-12">
												<div class="input-group-meta form-group mb-30">
													<label>Email*</label>
													<input type="email" placeholder="rshdkabir@gmail.com" name="email" required="required" data-error="Valid email is required.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta form-group mb-30">
													<textarea placeholder="Your message*" name="message" required="required" data-error="Please,leave us a message."></textarea>
													<div class="help-block with-errors"></div>
												</div>
											</div>
											<div class="col-12"><button class="btn-eight ripple-btn">Send Message</button></div>
										</div>
									</form>
								</div> <!-- /.form-style-one -->
							</div>

							<div class="col-lg-6 d-flex order-lg-first">
								<div class="map-area-one mt-10 me-lg-4 md-mt-50">
									<div class="mapouter">
										<div class="gmap_canvas">
											<iframe class="gmap_iframe" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=nsbm&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
										</div>
									</div>
								</div> <!-- /.map-area-one -->
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.contact-section-one -->



            
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
