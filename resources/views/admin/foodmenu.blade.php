<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
    <body>
    <div class="container-scroller">
      @include("admin.navbar")

      <div style="position: relative; top: 60px; right: -150px;">
        <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
          @csrf

          <div>
            <label for="">Title</label>
            <input style="color: blue;" type="text" name="title" placeholder="Write a title" required>
          </div>
          <div>
            <label for="">Price</label>
            <input style="color: blue;" type="number" name="price" placeholder="Price" required>
          </div>
          <div>
            <label for="">Image</label>
            <input type="file" name="image" required>
          </div>
          <div>
            <label for="">Description</label>
            <input style="color: blue;" type="text" name="description" placeholder="Write a description" required>
          </div>
          <div>
            <input style="color: black;" type="submit" value="Save">
          </div>
        </form>
      </div>

    </div>
    @include("admin.adminscript")
    </body>
</html>