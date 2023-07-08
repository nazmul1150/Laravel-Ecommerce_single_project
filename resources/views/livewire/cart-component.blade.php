@section('title')
Cart
@endsection


<!--main area-->
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                    <li class="item-link"><span>Cart</span></li>
                </ul>
            </div>
            <div class=" main-content-area">

                @if(Cart::instance('cart')->count() > 0)

                <div class="wrap-iten-in-cart">

                    @if(session()->has('message'))
                     <div class="alert alert-success">
                         {{session()->get('message')}}
                     </div>
                    @endif

                    @if(Cart::instance('cart')->count() > 0)

                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">

                        @foreach(Cart::instance('cart')->content() as $item)

                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{asset('website/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{route('product.details', ['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">${{$item->model->sale_price}}</p></div>
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >                                   
                                     <a class="btn btn-increase" href="#" wire:click.prevent="incressQuantity('{{$item->rowId}}')"></a>
                                    @if($item->qty === 1)
                                      <a class="btn btn-reduce disabled" href="#" wire:click.prevent="decressQuantity('{{$item->rowId}}')"></a>
                                    @else
                                       <a class="btn btn-reduce" href="#" wire:click.prevent="decressQuantity('{{$item->rowId}}')"></a>
                                    @endif
                                </div>
                                <p class="text-center"><a href="#" wire:click.prevent="switshToSaveLater('{{$item->rowId}}')">Save For Later</a></p>
                            </div>
                            <div class="price-field sub-total"><p class="price">${{$item->subtotal}}</p></div>
                            <div class="delete">
                                <a href="#" class="btn btn-delete" wire:click.prevent="deleteCartProduct('{{$item->rowId}}')">
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>

                        @endforeach

                    </ul>

                    @else
                      No Item in a Cart

                    @endif

                </div>

                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{Cart::instance('cart')->subtotal()}}</b></p>

                        @if(Session::has('coupon'))
                        <p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['code']}})<a href="#" wire:click.prevent="removeCouponCode"><i class="fa fa-times text-danger"></i></a></span><b class="index"> -${{number_format($discount, 2)}}</b></p>
                        <p class="summary-info"><span class="title">SubTotal with Discount</span><b class="index">${{number_format($subtotalAfterdiscount, 2)}}</b></p>
                        <p class="summary-info"><span class="title">Tex ({{config('cart.tax')}}%)</span><b class="index">${{number_format($taxAfterdiscount, 2)}}</b></p>
                         <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{number_format($totalAfterdiscount, 2)}}</b></p>

                        @else
                          <p class="summary-info"><span class="title">Tax</span><b class="index">${{Cart::instance('cart')->tax()}}</b></p>
                          <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                          <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{Cart::instance('cart')->total()}}</b></p>
                        @endif

                    </div>
                    <br>

                    <div class="checkout-info">
                        @if(!session()->has('coupon'))
                        @if(session()->has('coupon_message'))
                        <div class="alert alert-danger">{{session()->get('coupon_message')}}</div>
                        @endif

                        <div class="summary-item">
                            <form wire:submit.prevent='applyCouponCode'>
                                <h1 class="title-box">Coupon Code</h1>
                                <p class="row-in-form">
                                    <label>Enter Your Copon Code:</label>
                                    <input type="text" name="copon-code" wire:model="couponCode">
                                </p>
                                <input type="submit" class="btn btn-submit" value="Apply">
                            </form>
                        </div>
                        @endif
                        <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
                        <a class="link-to-shop" href="{{route('shop')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>

                    <div class="update-clear">
                        <a class="btn btn-clear" href="#" wire:click.prevent="destroyCartItem()">Clear Shopping Cart</a>
                        <a class="btn btn-update" href="#">Update Shopping Cart</a>
                    </div>
                </div>

                @else
                 <div class="text-center" style="padding:30px 0px;">
                     <h2>Your Cart is Empty</h2>
                     <p>Add items it now</p>
                     <a href="{{route('shop')}}" class="btn btn-primary">Shop now</a>
                 </div>
                 
                @endif

                <div class="wrap-iten-in-cart">

                    <h3 class="title-box" style="border-bottom: 1px solid; padding-bottom: 15px;">{{Cart::instance('saveForLater')->count()}} item(s) Save For Later</h3>

                    @if(session()->has('save_message'))
                     <div class="alert alert-success">
                         {{session()->get('save_message')}}
                     </div>
                    @endif

                    @if(Cart::instance('saveForLater')->count() > 0)

                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">

                        @foreach(Cart::instance('saveForLater')->content() as $item)

                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{asset('website/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{route('product.details', ['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">${{$item->model->sale_price}}</p></div>
                            <div class="quantity">
                                
                                <p class="text-center"><a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')">Move To Cart</a></p>
                            </div>
                            <div class="delete">
                                <a href="#" class="btn btn-delete" wire:click.prevent="deleteFromSaveForLater('{{$item->rowId}}')">
                                    <span>Delete from save for later</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>

                        @endforeach

                    </ul>

                    @else
                      No Item Save For Later

                    @endif

                </div>

                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Most Viewed Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('website/images/products/digital_04.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('website/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('website/images/products/digital_15.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('website/images/products/digital_01.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Bestseller</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('website/images/products/digital_21.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('website/images/products/digital_03.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('website/images/products/digital_04.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('website/images/products/digital_05.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Bestseller</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div><!--End wrap-products-->
                </div>

            </div><!--end main content area-->
        </div><!--end container-->

    </main>
    <!--main area-->