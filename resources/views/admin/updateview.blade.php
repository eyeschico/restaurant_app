<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  @include("homehead")
  </head>
    <body>
    @include("admin.adminnav")
      <div class="italotcontainer">
        <h2 class="italotadmintitle">Food Menu</h2>
        <form class="italotform" action="{{url('/update', $data->id)}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="italotinput">
            <h4>Add a food menu</h4>
          </div>

          <div class="italotinput">
            <label>Title</label>
            <input type="text" name="title" placeholder="Write a title" required>
          </div>
          <div class="italotinput">
            <label>Price</label>
            <input type="number" name="price" placeholder="Price" required>
          </div>
          <div class="italotinput">
            <label>Old image</label>
            <img height="200" width="200" src="/foodimage/{{$data->image}}" alt="">
          </div>
          <div class="italotinput">
            <label>New image</label>
            <input type="file" name="image" required>
          </div>
          <div class="italotinput">
            <label>Description</label>
            <input class="italotdescription" type="text" name="description" placeholder="Write a description" required>
          </div>
          <div class="italotsubmit">
            <input type="submit" value="Save">
          </div>
          
        </form>
      </div>
    @include("homescript")
    </body>
</html>