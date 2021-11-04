@include('homehead')

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

  <!-- ***** Nav ***** -->
  @include('homenav')

  <!-- ***** Main Banner ***** -->
  @include('mainbanner')

  <!-- ***** Flash Message ***** -->
  @include('flash-message')

  <!-- ***** About ***** -->
  @include('aboutus')

  <!-- ***** Food Menu ***** -->
  @include("food")

  <!-- ***** Food Chefs ***** -->
  @include("foodchef")

  <!-- ***** Reservation ***** -->
  @include("reservation")

  <!-- ***** Footer ***** -->
  @include("footer")

  <!-- ***** Scripts ***** -->
  @include("homescript")

</body>
</html>