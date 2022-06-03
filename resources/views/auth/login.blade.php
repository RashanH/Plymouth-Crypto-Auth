<x-guest-layout>

    <!-- 
=============================================
    Sign In
============================================== 
-->

    <div class="user-data-page clearfix d-md-flex">
        <div class="illustration-wrapper d-none d-md-flex align-items-center">
            <h3>Want to take your business on <br> the next level? Try <a href="sign-up.html">CryptFence</a></h3>
            <div class="illustration-holder">
                <img src="images/assets/ils_22.svg" alt="" class="illustration m-auto">
            </div>
        </div> <!-- /.illustration-wrapper -->

        <div class="form-wrapper">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo"><a href="index.html" class="d-block"><img src="images/logo/logo_01.png" alt=""
                            width="131"></a></div>
                <a href="{{ url('') }}" class="go-back-button tran3s">Go to home</a>
            </div>

            <h2>Hi buddy, welcome <br> Back!</h2>
            <p class="header-info pt-20 pb-20 lg-pt-10 lg-pb-10">Still don't have an account? <a
                    href="{{ url('register') }}">Sign up</a></p>

                    <x-jet-validation-errors class="mb-4" />
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="user-data-form mt-60 lg-mt-40">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="input-group-meta mb-25">
                            <label>Email</label>
                            <x-jet-input id="email" placeholder="Your email" class="block mt-1 w-full" type="email"
                                name="email" :value="old('email')" required autofocus />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group-meta mb-25">
                            <label>Password</label>
                            <x-jet-input id="password" class="block mt-1 w-full pass_log_id" type="password"
                                name="password" required autocomplete="current-password" placeholder="Your password" />
                            <span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_40.svg"
                                        alt=""></span></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                            <div>
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <label for="remember_me">Keep me logged in</label>
                            </div>
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                        </div> <!-- /.agreement-checkbox -->
                    </div>
                    <div class="col-12">
                        <button class="btn-eight w-100 mt-50 mb-40 lg-mt-30 lg-mb-30">Login</button>
                    </div>
                    <div class="col-12">
                        <p class="text-center copyright-text m0">Copyright @2022 CryptFence inc.</p>
                    </div>
                </div>
            </form>
        </div> <!-- /.form-wrapper -->
    </div> <!-- /.user-data-page -->





    <button class="scroll-top">
        <i class="bi bi-arrow-up-short"></i>
    </button>

</x-guest-layout>
