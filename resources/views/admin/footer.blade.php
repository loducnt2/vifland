<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/datatables.js') }}"></script>
<script src="{{asset('js/bootstrap-toggle.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
{{-- <script src="{{asset('js/')}}"></script> --}}

{{-- {{-- <script> --}}
     --}}
<script>
$( "#myform" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();

}); 
</script>

<script>
    $(document).ready( function () {
      $('#table_id').DataTable();
  } );
  </script>
<script> 
 slideNav();
function slideNav() {
    $(".sb-topnav button").on("click", function() {
        // $("#layoutSidenav #layoutSidenav_nav").toggleClass("active");
        $("#layoutSidenav #layoutSidenav_nav").toggleClass("active");
    });
} 
</script>