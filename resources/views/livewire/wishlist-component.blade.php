@section('title')
Wishlist
@endsection

<!--main area-->
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Shop</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-content-area">

                    <style type="text/css">
                        .product-wish{
                            position: absolute;
                            top: 10%;
                            z-index: 99;
                            right: 30px;
                        }
                        .product-wish .fa{
                            font-size: 20px;
                            color: #0000002e;
                        }
                        .product-wish .fa:hover{
                            color: #ff2832;
                        }
                        .product-wish .fill-heart{
                            color: #ff2832;
                        }
                    </style>

                    <div class="row">

                      @if(Cart::instance('wishlist')->content()->count() > 0)

                        <ul class="product-list grid-products equal-container">

                            @foreach(Cart::instance('wishlist')->content() as $item)

                            @php

                             

                             $id = $item->model->id;
                             $wish_items = App\Models\Product::where('id', $id)->get();
                             foreach($wish_items as $wish_item)
                             {
                               $slug = $wish_item->slug;
                               $image = $wish_item->image;
                             }
                            @endphp

                            <li class="col-lg-3 col-md-4 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.details',$item->model->slug)}}" title="{{$item->model->name}}">
                                            <figure><img src="{{asset('website/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.details',$item->model->slug)}}" class="product-name"><span>{{$item->model->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{$item->model->sale_price}}</span></div>
                                        <a href="#" class="btn add-to-cart" wire:click.prevent="moveProductFromWishlist('{{$item->rowId}}')">Add To Cart</a>

                                        <div class="product-wish">
                                             <a href="#" wire:click.prevent="removeFormToWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </li>

                            @endforeach

                        </ul>

                        @else
                         <h2>Wishlist No Products</h2>
                        @endif

                    </div>


                </div><!--end main products area-->

            </div><!--end row-->

        </div><!--end container-->

    </main>
    <!--main area-->

