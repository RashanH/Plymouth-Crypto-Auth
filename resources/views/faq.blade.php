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
                                <li class="nav-item active">
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
										<li class="active"><a href="#">1. <span>Makreting</span></a></li>
										<li><a href="#">2. <span>Buying</span></a></li>
										<li><a href="#">3. <span>User Manual</span></a></li>
										<li><a href="#">4. <span>Payments</span></a></li>
										<li><a href="#">5. <span>Terms & Conditions</span></a></li>
										<li><a href="#">6. <span>Account</span></a></li>
									</ul>
								</div>

								<div class="col-xl-8 col-lg-9" data-aos="fade-left">
									<h3 class="faq-title">Marketing</h3>
									<div class="accordion accordion-style-one" id="accordionOne">
										<div class="accordion-item">
										    <div class="accordion-header" id="headingOne">
										      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										        	What is web hosting?
										      	</button>
										    </div>
										    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
										    	<div class="accordion-body">
										        	<p>They not only understand what I say but read between the lines and also give me ideas of my own. AI technology is perfect for best business solutions. </p>
										    	</div>
										    </div>
									  	</div>
									  	<div class="accordion-item">
										    <div class="accordion-header" id="headingTwo">
										      	<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										        	How do you weigh different criteria in your process?
										      	</button>
										    </div>
										    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
										      	<div class="accordion-body">
										        	<p>They not only understand what I say but read between the lines and also give me ideas of my own. AI technology is perfect for best business solutions. </p>
										    	</div>
										    </div>
									  	</div>
									  	<div class="accordion-item">
										    <div class="accordion-header" id="headingThree">
										   		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										        	What can I use to build my website?
										      	</button>
										    </div>
										    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
										    	<div class="accordion-body">
										        	<p>They not only understand what I say but read between the lines and also give me ideas of my own. AI technology is perfect for best business solutions. </p>
										    	</div>
										    </div>
										</div>
										<div class="accordion-item">
										    <div class="accordion-header" id="headingFour">
										   		<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
										        	If I already have a website, can I transfer it to your web hosting?
										      	</button>
										    </div>
										    <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionOne">
										    	<div class="accordion-body">
										        	<p>They not only understand what I say but read between the lines and also give me ideas of my own. AI technology is perfect for best business solutions. </p>
										    	</div>
										    </div>
										</div>
										<div class="accordion-item">
										    <div class="accordion-header" id="headingFive">
										   		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										        	How can I accept credit cards online?
										      	</button>
										    </div>
										    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionOne">
										    	<div class="accordion-body">
										        	<p>They not only understand what I say but read between the lines and also give me ideas of my own. AI technology is perfect for best business solutions. </p>
										    	</div>
										    </div>
										</div>
										<div class="accordion-item">
										    <div class="accordion-header" id="headingSix">
										   		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
										        	How does Your Pricing Work?
										      	</button>
										    </div>
										    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionOne">
										    	<div class="accordion-body">
										        	<p>They not only understand what I say but read between the lines and also give me ideas of my own. AI technology is perfect for best business solutions. </p>
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
								<h3 class="pe-xxl-5 md-pb-20">Having any Query? Book an appointment.</h3>
							</div>
							<div class="col-lg-6 text-center text-lg-end" data-aos="fade-left">
								<a href="contact-us.html" class="msg-btn tran3s">Send Us Message</a>
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
