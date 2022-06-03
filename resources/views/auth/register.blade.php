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
            <p class="header-info pt-20 pb-20 lg-pt-10 lg-pb-10">Have an account? Login <a
                    href="{{ url('login') }}">here</a></p>

            <x-jet-validation-errors class="mb-4" />


            <form method="POST" action="{{ route('register') }}" class="user-data-form mt-60 lg-mt-40">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="input-group-meta mb-25">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Your name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group-meta mb-25">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Your email"
                                :value="old('email')" required />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group-meta mb-25">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Your password"
                                required autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group-meta mb-25">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Password again"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="col-12">
                        <div class="input-group-meta mb-25">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                            class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                            Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                            class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                            Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <button class="btn-eight w-100 mt-50 mb-40 lg-mt-30 lg-mb-30">Register</button>
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
