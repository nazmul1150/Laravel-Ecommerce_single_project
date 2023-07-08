@section('title')
Orders Details
@endsection

 <main id="main" class="main-site">
<div class="container">

   <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('home')}}" class="link">Home</a></li>
                    <li class="item-link"><span>My Order</span></li>
                </ul>
   </div>

<div class="row">
   <div class="col-md-3 col-12 p-20">
      <ul class="nav u_dash">
         <li class="menu-item u_dash_li">
            <a class="item-link u_dash_li_a" href="{{route('user.dashbord')}}">Dashbord</a>
         </li>
         <li class="menu-item u_dash_li">
            <a class="item-link u_dash_li_a" href="{{route('user.orders')}}">Orders</a>
         </li>
         <li class="menu-item u_dash_li">
            <a class="item-link u_dash_li_a" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
         </li>
         <form id="logout-form" method="POST" action="{{route('logout')}}">
          @csrf
         </form>
      </ul>
   </div>

   <div class="col-md-9 col-12 p-20">
    
    @if(session()->has('message'))
     <div class="alert alert-success" role="alert">{{session()->get('message')}}</div>
    @endif

<div class="panel panel-default">
    <div class="panel-heading">

        <div class="row">
            <div class="col-md-6">
                Order Details
            </div>
            <div class="col-md-6">
                <a href="{{route('user.orders')}}" class="btn btn-success btn-sm pull-right" style="margin:2px;">My Order</a>
                @if($order->status == 'ordered')
                <a href="#" wire:click.prevent="cancelOrder" class="btn btn-warning btn-sm pull-right" style="margin:2px;">Cancel Order</a>
                @endif
            </div>
        </div>
        <div class="panel-body">
            <div class="wrap-iten-in-cart">
             <table class="table table-striped">
                        <tr>
                            <th>Order Id :</th>
                            <td>{{$order->id}}</td>
                            <th>Order Date :</th>
                            <td>{{$order->created_at}}</td>
                            <th>Status :</th>
                            <td>{{$order->status}}</td>
                            @if($order->status == 'delivered')
                             <th>Delivery Date :</th>
                             <td>{{$order->delivered_date}}</td>
                             @endif
                             @if($order->status == 'canceled')
                             <th>Canceled Date :</th>
                             <td>{{$order->canceled_date}}</td>
                             @endif
                        </tr>
                    </table>
        </div>
        </div>
    </div>
    <div class="panel-heading">
        <div class="row">
         <div class="col-md-12">
             Order Items
         </div>
     </div>
    </div>
    <div class="panel-body">
        <div class="wrap-iten-in-cart">
            <h3 class="title-box">Product Name</h3>
            <ul class="products-cart">

                @foreach($order->orderItems as $item)

                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{asset('website/images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{route('product.details', ['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">${{$item->price}}</p></div>
                            <div class="quantity">{{$item->quentity}}</div>
                            <div class="price-field sub-total"><p class="price">${{$item->price * $item->quentity}}</p>
                            </div>
                            @if($order->status == 'delivered' && $item->rstatus == false)
                            <div class="price-field sub-total"><p class="price"><a href="{{route('user.review',$item->id)}}">Write Review</a></p>
                            </div>
                            @endif
                        </li>

                @endforeach

            </ul>
        </div>

        <div class="wrap-iten-in-cart">
            <h3 class="title-box">Order Summary</h3>
            <div>
             <br>
             <p>Subtotal : <b>{{$order->subtotal}}</b></p>
             <p>Discount : <b>{{$order->discount}}</b></p>
             <p>Tax : <b>{{$order->tax}}</b></p>
             <p>Shipping : <b>Free Shipping</b></p>
             <p>Total : <b>{{$order->total}}</b></p>
            </div>
        </div>

        <div class="wrap-iten-in-cart">
            <h3 class="title-box">Billing Details</h3>
            <div>
             <br>
                 <table class="table table-striped">
                        <tr>
                            <th>First Name :</th>
                            <td>{{$order->firstname}}</td>
                            <th>Last Name :</th>
                            <td>{{$order->lastname}}</td>
                        </tr>
                        <tr>
                            <th>Phone :</th>
                            <td>{{$order->phone}}</td>
                            <th>Email :</th>
                            <td>{{$order->email}}</td>
                        </tr>
                        <tr>
                            <th>Line1 :</th>
                            <td>{{$order->add1}}</td>
                            <th>Line2 :</th>
                            <td>{{$order->add2}}</td>
                        </tr>
                        <tr>
                            <th>City :</th>
                            <td>{{$order->city}}</td>
                            <th>Country :</th>
                            <td>{{$order->country}}</td>
                        </tr>
                        <tr>
                            <th>Post Code :</th>
                            <td>{{$order->postcode}}</td>
                            <th>Shipping Different :</th>
                            <td>{{$order->is_shipping_different ? 'yes' : 'no'}}</td>
                        </tr>
                    </table>
            </div>
        </div>

         @if($order->is_shipping_different)
         <div class="wrap-iten-in-cart">
            <h3 class="title-box">Shipping Details</h3>
            <div>
             <br>
                <table class="table table-striped">
                        <tr>
                            <th>First Name :</th>
                            <td>{{$order->shipping->firstname}}</td>
                            <th>Last Name :</th>
                            <td>{{$order->shipping->lastname}}</td>
                        </tr>
                        <tr>
                            <th>Phone :</th>
                            <td>{{$order->shipping->phone}}</td>
                            <th>Email :</th>
                            <td>{{$order->shipping->email}}</td>
                        </tr>
                        <tr>
                            <th>Line1 :</th>
                            <td>{{$order->shipping->add1}}</td>
                            <th>Line2 :</th>
                            <td>{{$order->shipping->add2}}</td>
                        </tr>
                        <tr>
                            <th>City :</th>
                            <td>{{$order->shipping->city}}</td>
                            <th>Country :</th>
                            <td>{{$order->shipping->country}}</td>
                        </tr>
                        <tr>
                            <th>Post Code :</th>
                            <td>{{$order->shipping->postcode}}</td>
                        </tr>
                    </table>
            </div>
        </div>
         @endif

         <div class="wrap-iten-in-cart">
            <h3 class="title-box">Transaction Details</h3>
            <div>
             <br>
               <table class="table table-striped">
                        <tr>
                            <th>Transaction Mode :</th>
                            <td>{{$order->transaction->mode == 'code' ? 'Cash on Delivery' : ''}}</td>
                        </tr>
                        <tr>
                            <th>Transaction Status :</th>
                            <td>{{$order->transaction->status}}</td>
                        </tr>
                        <tr>
                            <th>Transaction Date :</th>
                            <td>{{$order->transaction->created_at}}</td>
                        </tr>
               </table>
            </div>
        </div>


    </div>
</div>

   </div>

</div>

</div>

</main>
    <!--main area-->