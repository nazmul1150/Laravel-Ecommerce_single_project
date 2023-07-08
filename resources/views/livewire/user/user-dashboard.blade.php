@section('title')
 User Dashbord
@endsection

 <main id="main" class="main-site">
<div class="container">

   <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                    <li class="item-link"><span>user Dashbord</span></li>
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
      lll
   </div>
</div>

</div>

</main>
    <!--main area-->