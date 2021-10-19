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
	<title>ITALOT</title>

	<!-- Additional CSS Files -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
	<link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
	<link rel="stylesheet" href="assets/css/owl-carousel.css">
	<link rel="stylesheet" href="assets/css/lightbox.css">
  <link rel="stylesheet" href="assets/css/header.css">
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
    @include('homenav')
    <!-- ***** Header Area End ***** -->

    <div id="top">
      <table align="center" bgcolor="grey">
        <tr>
          <th style="padding: 30px;">Food Name</th>
          <th style="padding: 30px;">Price</th>
          <th style="padding: 30px;">Quantity</th>
          <th style="padding: 30px;">Action</th>
        </tr>
      <form action="{{url('orderconfirm')}}" method="post">
        @csrf
          @foreach($data as $data)
          <tr align="center">
            <td><input type="text" name="foodname[]" value="{{$data->title}}" hidden>{{$data->title}}</td>
            <td><input type="text" name="price[]" value="{{$data->price}}" hidden>{{$data->price}}€</td>
            <td><input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>{{$data->quantity}}</td>
          </tr>
          @endforeach

          @foreach($data2 as $data2)
          <tr style="position: relative; top: -60px; right: -360px;">
            <td><a href="{{url('/remove', $data2->id)}}" class="btn btn-danger">Remove</a></td>
          </tr>

          @endforeach

        </table>

        <div align="center" style="padding: 10px;">
          <button class="btn btn-primary" type="button" id="order">Order Now</button>
        </div>

        <div id="appear" align="center" style="padding: 10px; display: none;">
          <div style="padding: 10px;">
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Name">
          </div>
          <div style="padding: 10px;">
            <label for="">Phone</label>
            <input type="number" name="phone" placeholder="phone">
          </div>
          <div style="padding: 10px;">
            <label for="">Adress</label>
            <input type="text" name="address" placeholder="Adress">
          </div>
          <div style="padding: 10px;">
            <input class="btn btn-success" type="submit" value="Order Confirm" >
            <button id="close" type="button" class="btn btn-danger">Close</button>
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