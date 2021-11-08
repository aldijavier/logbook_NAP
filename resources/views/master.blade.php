<!DOCTYPE html>
<html lang="en">
    <head>

      

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      
      {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"> --}}
      
      
      
      
      {{-- ini untuk datatable --}}
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  
     


     


<title>@yield('title')</title> 

      <style>
      #myScrollTable thead,tbody{         
        clear:both;
        border:0px solid 3FF6600;
        height:300px;
        overflow-y:scroll;
        float:center;
        width:300x;
        text-align:center;
        }
      </style>

<script type="text/javascript">
    function showTime() {
      var date = new Date(),
          utc = new Date(Date(
            date.getFullYear(),
            date.getMonth(),
            date.getDate(),
            date.getHours(),
            date.getMinutes(),
            date.getSeconds()
          ));
      document.getElementById('time').innerHTML = utc.toLocaleString();
    //   document.getElementById('time').innerHTML = utc.toLocaleTimeString();
    }
    setInterval(showTime, 1000);
  </script>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script> --}}

  
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "dd/mm/y",//check change
  changeMonth: true,
  changeYear: true,
  showAnim:"clip",
    });
  } );
  </script>

<script>
    $(function(){
        $("#datepicker2").datepicker({ 
        dateFormat:"dd-mm-yy",
        });
    });
</script>

  
<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">

{{-- data tables --}}
<link rel="stylesheet" href="{{asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  


{{-- Untuk Image Preview --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
                                  




</head>
   <body>
     {{-- Untuk validasi nomor --}}

     <script>
        function myfun(){
          var a=document.getElementById("mobilenumber").value;
          if(a.charCodeAt(0)  == 57){
            document.getElementById("messages").innerHTML="** Dimulai Dari 0 atau 62";
            return false;
          }
        }
       </script>
       <div id="App">
       <nav class="navbar navbar-expand-lg navbar-light bg-light" >
           <a class="navbar-brand" style="color:orange;"><b>GUEST BOOK NAP INFO</b></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                   <li class="nav-item active">
                       {{-- <a class="nav-link" href="#"> Guest List </a> --}}
                   </li>
               </ul>
               <a class="btn btn-warning"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
           </div>
       </nav>
       <div class="container py-5" >
           <div class="row-center">
               @yield('content')
   
           </div>
       </div>
   </div>



   
       @stack('page-scripts')
       
       @stack('after-scripts')

<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



{{-- untuk modal pop up image  --}}
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
    });		
});

// 


</script>
</body>
{{-- <footer>
  <script>
    function PrintPage(divName){
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    
    }
    </script>
</footer> --}}
</html>