@section('title')
 Order Details
@endsection

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Orders Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.orders')}}">Back</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Orders Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- end page header -->
                <!-- Striped table start -->


                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div>
                            <h5>Ordered Items</h5>
                        </div>
                    </div>

              
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>
                                            <a href="{{route('product.details',['slug'=>$item->product->slug])}}">
                                                <img src="{{asset('website/images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}" width="120" height="120" />
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('product.details',['slug'=>$item->product->slug])}}">
                                             {{$item->product->name}}
                                             </a>
                                        </td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->quentity}}</td>
                                        <td>{{$item->price * $item->quentity}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div>
                                <h6>Order Summary</h6>
                                <br>
                                <p>Subtotal : <b>{{$order->subtotal}}</b></p>
                                <p>Discount : <b>{{$order->discount}}</b></p>
                                <p>Tax : <b>{{$order->tax}}</b></p>
                                <p>Shipping : <b>Free Shipping</b></p>
                                <p>Total : <b>{{$order->total}}</b></p>
                            </div>
               

                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h5>Order Details</h5>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>Order Id :</th>
                            <td>{{$order->id}}</td>
                            <th>Order Date:</th>
                            <td>{{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Status :</th>
                            <td>{{$order->status}}</td>
                             @if($order->status == 'delivered')
                             <th>Delivery Date :</th>
                             <td>{{$order->delivered_date}}</td>
                             @endif
                             @if($order->status == 'canceled')
                             <th>Cancellation Date :</th>
                             <td>{{$order->canceled_date}}</td>
                             @endif
                        </tr>
                    </table>
                    
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h5>Billing Details</h5>
                        </div>
                    </div>

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

                @if($order->is_shipping_different)
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h5>Shipping Details</h5>
                        </div>
                    </div>

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
                @endif


                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h5>Transaction Details</h5>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>Transaction Mode :</th>
                            <td>{{$order->transaction->mode}}</td>
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
                <!-- Striped table End -->
                <br>
        </div>
    </div>
</div>