<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
  @include("homehead")
  </head>
  <body>
    @include("admin.adminnav")
    <div class="italotcontainer">
      <h2 class="italotadmintitle"> Update Chef</h2>
      <form class="italotform" action="{{url('/updatefoodchef', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="italotinput">
          <label >Name</label>
          <input type="text" name="name" placeholder="Enter name" required>
        </div>
        <div class="italotinput">
          <label for="">Speciality</label>
          <input type="text" name="speciality" placeholder="Enter the speciality" required>
        </div>
        <div class="italotinput">
          <label>Old Photo</label>
          <img height="200" width="200" src="/chefimage/{{$data->image}}" alt="">
        </div>
        <div class="italotinput">
          <label>New Photo</label>
          <input type="file" name="image" required>
        </div>
        <div class="italotsubmit">
          <input type="submit" value="Save">
        </div>

      </form>
    </div>
    @include("admin.adminscript")
  </body>
</html>