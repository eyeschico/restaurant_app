<!DOCTYPE html>
<html lang="en">
  <head>
  @include("homehead")
  </head>
  <body>
    @include("admin.adminnav")
    <div class="italotcontainer">
      <h2 class="italotadmintitle">Chefs</h2>
      <form class="italotform" action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
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
          <label for="">Photo</label>
          <input type="file" name="image" required>
        </div>
        <div class="italotsubmit">
          <input type="submit" value="Save">
        </div>
      </form>

      <table>
        <thead>
          <tr>
            <th>Chef Name</th>
            <th>Speciality</th>
            <th>Image</th>
            <th>Action</th>
            <th>Action</th>
          </tr>        
        </thead>
        <tbody>
        @foreach($data as $data)
            <tr align="center">
              <td data-column="Name">{{$data->name}}</td>
              <td data-column="Speciality">{{$data->speciality}}</td>
              <td data-column="Image"><img height="100" width="100" src="/chefimage/{{$data->image}}" alt=""></td>
              <td data-column="Update"><a href="{{url('/updatechef', $data->id)}}">Update</a></td>
              <td data-column="Delete"><a href="{{url('/deletechef', $data->id)}}">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @include("admin.adminscript")
  </body>
</html>