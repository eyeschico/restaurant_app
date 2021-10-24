<!DOCTYPE html>
<html lang="en">
  <head>
  @include("homehead")
  </head>
    <body>
    @include("admin.adminnav")
      <div class="italotcontainer">
      <h2 class="italotadmintitle">Users</h2>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>E-Mail</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($data as $data)
            <tr>
              <td data-column="Name">{{$data->name}}</td>
              <td data-column="E-Mail">{{$data->email}}</td>
              @if($data->usertype=="0")
              <td data-column="Delete"><a href="{{url('/deleteuser',$data->id)}}">Delete</a></td>
              @else
              <td>Not Allowed</td>
              @endif   
            </tr>
            @endforeach
          </tbody>
        </table>
     
      </div>
      @include("homescript")
    </body>
</html>