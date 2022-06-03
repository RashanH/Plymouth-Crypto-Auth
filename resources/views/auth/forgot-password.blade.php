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
                <a href="{{ url('login') }}" class="go-back-button tran3s">Go to login</a>
            </div>

            <h2>Forgot your password?<br>No problem. </h2>
            <p class="header-info pt-20 pb-20 lg-pt-10 lg-pb-10">Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                    <x-jet-validation-errors class="mb-4" />
           
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

            <form method="POST" action="{{ route('password.email') }}" class="user-data-form mt-60 lg-mt-40">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="input-group-meta mb-25">
                            <label>Email</label>
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <button class="btn-eight w-100 mt-50 mb-40 lg-mt-30 lg-mb-30">Email Password Reset Link</button>
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
