
<x-base-layout>

    <!--main area-->
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                    <li class="item-link"><span>Register</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">                          
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="register-form form-item form-stl">
                                <x-jet-validation-errors class="mb-4" />
                                <form action="{{route('register')}}" name="frm-login" method="POST" >
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Create an account</h3>
                                    </fieldset>                                 
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-lname">Name*</label>
                                        <input type="text" id="name" name="name" placeholder="Name*" :value="old('name')" required autofocus autocomplete="name">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-email">Email Address*</label>
                                        <input type="email" id="email" name="email" placeholder="Email address" :value="old('email')" required>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-pass">Password *</label>
                                        <input type="password" name="password" id="password" placeholder="Password" required autocomplete="new-password">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-cfpass">Confirm Password *</label>
                                        <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                    </fieldset>
                                    
                                    <input type="submit" class="btn btn-sign" value="Register" name="register">

                                    <fieldset class="wrap-functions ">
                                        <label class="remember-field">{{ __('Already registered?') }}
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                             LogeIn
                                            </a>
                                        </label>
                                    </fieldset>
                                </form>
                            </div>                                          
                        </div>
                    </div><!--end main products area-->     
                </div>
            </div><!--end row-->

        </div><!--end container-->

    </main>
    <!--main area-->

</x-base-layout>


