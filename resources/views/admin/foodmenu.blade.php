<!DOCTYPE html>
<html lang="en">
  <head>
  @include("homehead")
  </head>
    <body>
    @include("admin.adminnav")
      <div class="italotcontainer">
        <h2 class="italotadmintitle">Food Menu</h2>
        <form class="italotform" action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
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
            <label>Image</label>
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



        <table>
          <thead>
            <tr>
              <th>Food Name</th>
              <th>Price</th>
              <th>Description</th>
              <th>Image</th>
              <th>Update</th>      
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
          @foreach($data as $data)
            <tr>
              <td data-column="Title">{{$data->title}}</td>
              <td data-column="Price">{{$data->price}} €</td>
              <td data-column="Description">{{$data->description}}</td>
              <td data-column="Image"><img height="200" width="200" src="/foodimage/{{$data->image}}" alt=""></td>
              <td data-column="Update"><a href="{{url('/updateview', $data->id)}}">Update</a></td>
              <td data-column="Delete"><a href="{{url('/deletemenu', $data->id)}}">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    @include("homescript")
    </body>
</html>