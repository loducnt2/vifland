 @extends('admin.sidebar')
  @section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <div class="container">
  <h2>Banner</h2>
 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>name</th>
        <th>Position</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody id="myTable">
      @foreach($banners as $banner)
      <tr>
        <td>{{$banner->id}}</td>
        <td>{{$banner->name}}</td>
        <td>{{$banner->position}}</td>
       <td>{{$banner->status}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  @endsection
