<!-- ***** Chefs Area Starts ***** -->
<section class="section" id="chefs">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="section-heading">
          <h6>Our Chefs</h6>
          <h2>We offer the best ingredients for you</h2>
        </div>
      </div>
    </div>

    <div class="foodchef-flex">
      @foreach($data2 as $data2)

        <div class='foodchef-carte' style="background-image: url('/chefimage/{{$data2->image}}');">
          <div class="foodchef-color">
            <div class="foodchef-text" height="20">
              <h2>{{$data2->name}}</h2>
              <p>{{$data2->speciality}}</p>
            </div>
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>


        </div>
      @endforeach
    </div>

  </div>
</section>
<!-- ***** Chefs Area Ends ***** -->