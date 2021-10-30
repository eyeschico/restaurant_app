<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Boomy's</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/boomys.css">
	</head>
	
	<body>
	
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
      <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    <!-- ***** Header Area Start *****-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbg">
      <!-- ***** Logo Start ***** -->
      <div>
        <a class="italotlogo" href="{{url('/')}}">Boomy's</a>  
      </div>

        
      <!-- ***** Logo End ***** -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mainnav">
          <li class="nav-item">
            <a class="nav-link " href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/#about')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/#menu')}}">Menus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/#chefs')}}">Chefs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/#reservation')}}">Reservation</a>
          </li>
          </ul>
            @if (Route::has('login'))
              @auth
              <ul class="nav navbar-nav navbar-right navlogin">
                <li class="nav-item">
                  @auth 
                  <a class="nav-link" href="{{url('/showcart', Auth::user()->id)}}">Cart <span class="howmuch">{{$count ?? ''}}</span></a>
                  @endauth

                  @guest
                  <a class="nav-link" href="#menu">Cart <span class="howmuch">0</span></a>
                    
                  @endguest
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                    <a class="dropdown-item">
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                          {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                      </form>
                    </a>
                  </div>
                </li>            
              </ul>


                @else

                <li class="nav-item navlogin">
                  <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                  @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                  @endif
                </li>  
              @endauth
            @endif
        
      </div>
    </nav>
    <!-- ***** Header Area End ***** -->

    <div id="delivery">

    <h2>Your order</h2>
    <table>
      <thead>
        <tr>
          <th scope="col">Food Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <form action="{{url('orderconfirm')}}" method="post">
      @csrf
        @foreach($data as $data)
        <tr>
          <td data-label="Food Name"><input type="text" name="foodname[]" value="{{$data->title}}" hidden>{{$data->title}}</td>
          <td data-label="Price"><input type="text" name="price[]" value="{{$data->price}}" hidden>{{$data->price}}€</td>
          <td data-label="Quantity"><input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>{{$data->quantity}}</td>
          <td data-label="Delete"><a href="{{url('/remove', $data->id)}}">Remove</a></td>
        </tr>
        @endforeach

      </tbody>
    </table>
    <div class="main-delivery">
          <button class="btn-delivery" type="button" id="order">Order Now</button>

          <div id="appear">
            <div class="info">
              <label>Name</label>
              <input type="text" name="name" placeholder="Name">
            </div>
            <div class="info">
              <label>Phone</label>
              <input type="number" name="phone" placeholder="phone">
            </div>
            <div class="info">
              <label>Adress</label>
              <input type="text" name="address" placeholder="Adress">
            </div>
            <div class="btn-delivery-2">
              <input class="btn btn-success" type="submit" value="Order Confirm" >
              <button id="close" type="button" class="btn btn-danger">Close</button>
            </div>

          </div>
    </div>
    

        </form>
    </div>


<script type="text/javascript">
  //apparition du form
  $("#order").click(
    function(){
      $("#appear").show();
    }
  )

  $("#close").click(
    function(){
      $("#appear").hide();
    }
  )
</script>


  <!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/slick.js"></script> 
<script src="assets/js/lightbox.js"></script> 
<script src="assets/js/isotope.js"></script> 

<!-- Global Init -->
<script src="assets/js/custom.js"></script>
<script>

  $(function() {
    var selectedClass = "";
    $("p").click(function(){
    selectedClass = $(this).attr("data-rel");
    $("#portfolio").fadeTo(50, 0.1);
      $("#portfolio div").not("."+selectedClass).fadeOut();
    setTimeout(function() {
      $("."+selectedClass).fadeIn();
      $("#portfolio").fadeTo(50, 1);
    }, 500);
      
    });
  });

</script>
</body>
</html>