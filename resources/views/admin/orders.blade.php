<!DOCTYPE html>
<html lang="en">
  <head>
  @include("homehead")
  </head>
    <body>
      @include("admin.adminnav")
      <div class="italotcontainer">
        <h2 class="italotadmintitle">Orders</h2>
        <form class="italotform" action="{{url('/search')}}" method="get">
          <div class="italotinput">
            <h4>Search a user</h4>
          </div>

          <div class="italotinput-search">
            <input type="text" name="search">
            <div class="italotsubmit">
              <input type="submit" value="Search">  
            </div>
                     
          </div>
        </form>

        <div>
          <table>
            <thead>
              <tr>
                <td>Name</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Food Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total Price</td>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $data)
              <tr>
                <td data-column="Name">{{$data->name}}</td>
                <td data-column="Phone">{{$data->phone}}</td>
                <td data-column="Adress">{{$data->address}}</td>
                <td data-column="Food Name">{{$data->foodname}}</td>
                <td data-column="Price">{{$data->price}}</td>
                <td data-column="Quantity">{{$data->quantity}}</td>
                <!--multiplie le prix par la quantité-->
                <td data-column="Total">{{$data->price*$data->quantity}}€</td>
              </tr>
            @endforeach              
            </tbody>
          </table>
        </div>
      </div>
      @include("homescript")
    </body>
</html>