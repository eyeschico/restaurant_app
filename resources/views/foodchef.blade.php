<!-- ***** Chefs Area Starts ***** -->
<section class="section" id="chefs">
  <div class="container">
    <h6>Our Chefs</h6>
    <h2>Our best chefs are here to treat you</h2>

    <div class="foodchef-flex">
      @foreach($data2 as $data2)

        <div class='foodchef-carte' style="background-image: url('/chefimage/{{$data2->image}}');">
          <div class="foodchef-color">
            <div class="foodchef-text" height="20">
              <h4>{{$data2->name}}</h4>
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