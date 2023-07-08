
 <x-base-layout>
    <!--main area-->
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                    <li class="item-link"><span>forgot password</span></li>
                </ul>
            </div>
             @if (session('status'))
              <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
              </div>
            @endif
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">                      
                            <div class="login-form form-item form-stl">
                                <x-jet-validation-errors class="mb-4 phone-number" />
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Forgot Password</h3>                                      
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="email">Email Address:</label>
                                        <input type="email" id="email" name="email" placeholder="Type your email address" :value="old('email')" required autofocus />
                                    </fieldset>
                                   
                                    <input type="submit" class="btn btn-submit" value="Email password reset link" name="submit">
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
