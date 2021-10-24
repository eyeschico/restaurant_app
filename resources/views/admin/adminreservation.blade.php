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
              <th>Email</th>
              <th>Phone</th>
              <th>Guest</th>
              <th>Date</th>
              <th>Time</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $data)
              <tr>
                <td data-column="Name">{{$data->name}}</td>
                <td data-column="E-Mail">{{$data->email}}</td>
                <td data-column="Phone">{{$data->phone}}</td>
                <td data-column="Guest">{{$data->guest}}</td>
                <td data-column="Date">{{$data->date}}</td>
                <td data-column="Time">{{$data->time}}</td>
                <td data-column="Message">{{$data->message}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @include("homescript")
    </body>
</html>