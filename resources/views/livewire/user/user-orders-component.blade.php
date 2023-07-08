@section('title')
Orders
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

      <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">OrderId</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Tex</th>
                                <th scope="col">Total</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email</th>
                                <th scope="col">Zipcode</th>
                                <th scope="col">Status</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$order->id}}</th>
                                <td>${{$order->subtotal}}</td>
                                <td>${{$order->discount}}</td>
                                <td>${{$order->tax}}</td>
                                <td>${{$order->total}}</td>
                                <td>{{$order->firstname}}</td>
                                <td>{{$order->lastname}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->postcode}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-primary btn-sm">Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$orders->links()}}

   </div>

</div>

</div>

</main>
    <!--main area-->