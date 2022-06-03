<!-- 
			=============================================
				Theme Main Menu
			============================================== 
			-->

<div class="main-page-wrapper bg-white">


    <header class="theme-main-menu sticky-menu theme-menu-four" style="position: unset;">
        <div class="inner-content">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="logo order-lg-0"><a href="{{ url('') }}" class="d-block"><img src="{{ asset('images/logo/logo_02.png') }}"
                            alt="" width="129"></a></div>

                <div class="right-widget d-flex align-items-center ms-auto ms-lg-0 order-lg-3">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}" class="req-demo-btn tran3s d-none d-lg-block"
                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>


                </div> <!-- /.right-widget -->

                <nav class="navbar navbar-expand-lg order-lg-2">
                    <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item @if(request()->routeIs('dashboard')) active @endif">
                                <a class="nav-link" href="{{ route('dashboard') }}" active
                                    role="button">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('products.*')) active @endif">
                                <a class="nav-link" href="{{ route('products.index') }}" active
                                    role="button">{{ __('Products') }}</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('customers.*')) active @endif">
                                <a class="nav-link" href="{{ route('customers.index') }}" active
                                    role="button">{{ __('Customers') }}</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('billing')) active @endif">
                                <a class="nav-link" href="{{ route('billing') }}" active
                                    role="button">{{ __('Billing') }}</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('profile.*')) active @endif">
                                <a class="nav-link" href="{{ route('profile.show') }}" active
                                    role="button">Account</a>
                            </li>
							
                            <!--
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">Portfolio</a>
                                <ul class="dropdown-menu">
                                    <li><a href="portfolio-V1.html" class="dropdown-item"><span>Portfolio 3
                                                Column</span></a></li>
                                    <li><a href="portfolio-V2.html" class="dropdown-item"><span>Portfolio 2
                                                Column</span></a></li>
                                    <li><a href="portfolio-V3.html" class="dropdown-item"><span>Portfolio
                                                Masonry</span></a></li>
                                    <li><a href="portfolio-details-V1.html" class="dropdown-item"><span>Single
                                                Portfolio</span></a></li>
                                </ul>
                            </li>
                        -->
                        </ul>

                        <!-- Mobile Content -->
                        <div class="mobile-content d-block d-lg-none">
                            <div class="d-flex flex-column align-items-center justify-content-center mt-70">
                                <a href="contact-us.html" class="req-demo-btn tran3s">Request a Demo</a>
                            </div>
                        </div> <!-- /.mobile-content -->
                    </div>
                </nav>
            </div>
        </div> <!-- /.inner-content -->
    </header> <!-- /.theme-main-menu -->

    
</div> <!-- /.main-page-wrapper -->

</div>
