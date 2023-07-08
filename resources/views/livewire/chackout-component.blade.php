@section('title')
Checkout
@endsection

<!--main area-->
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <form method="POST" action="" wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
                    @csrf
                <div class="row">

                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                         <h3 class="box-title">Billing Address</h3>
                            <div class="belling-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model='firstname'>
                                    @error('firstname') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model='lastname'>
                                    @error('lastname') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model='email'>
                                    @error('email') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model='phon'>
                                    @error('phon') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1:</label>
                                    <input type="text" name="add1" value="" placeholder="Street at apartment number" wire:model='b_add1'>
                                    @error('b_add1') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2:</label>
                                    <input type="text" name="add2" value="" placeholder="Street at apartment number" wire:model='b_add2'>
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model='country'>
                                    @error('country') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model='zipcode'>
                                    @error('zipcode') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model='city'>
                                    @error('city') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form fill-wife">
                                    <label class="checkbox-field ship_to_different">
                                        <input name="ship_to_different" onchange="ShippingAddress()" value="1" type="checkbox" wire:model='ship_to_different'>
                                        <span>Ship to a different address?</span>
                                    </label>
                                </p>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-12 shipping_address">
                        <div class="wrap-address-billing">
                         <h3 class="box-title">Shipping Address</h3>
                            <div class="belling-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model='s_firstname'>
                                    @error('s_firstname') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model='s_lastname'>
                                    @error('s_lastname') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model='s_email'>
                                    @error('s_email') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model='s_phon'>
                                    @error('s_phon') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1:</label>
                                    <input type="text" name="s_add1" value="" placeholder="Street at apartment number" wire:model='s_add1'>
                                    @error('s_add1') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2:</label>
                                    <input type="text" name="s_add2" value="" placeholder="Street at apartment number" wire:model='s_add2'>
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model='s_country'>
                                    @error('s_country') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model='s_zipcode'>
                                    @error('s_zipcode') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model='s_city'>
                                    @error('s_city') <span class="error text-danger">{{$message}}</span> @enderror
                                </p>
                        </div>
                      </div>
                    </div>
 
                </div>
               

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        <div class="wrap-address-billing">
                            <p class="row-in-form">
                                    <label for="card-no">Curd Number<span>*</span></label>
                                    <input type="text" name="card-no" value="cart" placeholder="curd number" wire:model='paymentmode'>
                            </p>
                        </div>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="paymentmode" id="payment-method-bank" value="code" type="radio" required wire:model='paymentmode'>
                                <span>Cash On Delivery</span>
                                <span class="payment-desc">Order Now Pay on Delivery</span>
                            </label>
                            <label class="payment-method">
                                <input name="paymentmode" id="payment-method-visa" value="cart" type="radio" required wire:model='paymentmode'>
                                <span>Debit  / Credit Cart</span>
                                <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                            </label>
                            <label class="payment-method">
                                <input name="paymentmode" id="payment-method-paypal" value="paypal" type="radio" required wire:model='paymentmode'>
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label>
                            @error('paymentmode') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        @if(session()->has('checkout'))
                        <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{session()->get('checkout')['total']}}</span></p>
                        @endif

                        @if($errors->isEmpty())
                            <div wire:ignore id="processing" style="font-size: 22px;margin-bottom: 20px;padding-left: 37px; color: green;display: none;">
                                <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                <span>Processing...</span>
                            </div>
                        @endif
                        
                        <input type="submit" class="btn btn-medium" value="Place order now">
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed $0</span></p>
                  
                       
                    </div>
                </div>
            </form>
                </div>

                

            </div><!--end main content area-->
        </div><!--end container-->

    </main>
    <!--main area-->

    @push('scripts')
    <script type="text/javascript">
        //
    </script>
    @endpush