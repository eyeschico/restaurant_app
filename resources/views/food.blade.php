<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
  <div class="container">

    <h6>Our Menu</h6>
    <h2>Our selection of cakes with quality taste</h2>

    <div class="carte-flex">
      @foreach($data as $data)
        <form action="{{url('/addcart', $data->id)}}" method="post">
          @csrf
            <div class='carte'>

                <div class="carte-image" style="background-image: url('/foodimage/{{$data->image}}');" ></div>
                <div class="carte-text" height="20">
                  <h2>{{$data->title}}</h2>
                  <p>{{$data->description}}</p>
                </div>
                <div class="carte-adds">
                  <div class="add">
                    <h4 class="price">{{$data->price}}€</h4>
                  </div>
                  <div class="add">
                    <input class="quantity" type="number" name="quantity" min="1" value="0" >
                  </div>
                  <div class="add">
                    <input class="submit" type="submit" value="Add cart">
                  </div>
                </div> 

            </div>
        </form>
      @endforeach
    </div>


  </div>


</section>
<!-- ***** Menu Area Ends ***** -->

