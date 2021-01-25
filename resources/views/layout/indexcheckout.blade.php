@extends('master')
@section('title','Guest Book Nap Info')
@section('content') 
<script type="text/javascript">window.setTimeout("document.getElementById('successMessage').style.display='none';", 4500); </script>

<div class="card-header row justify-content-center" >
    <form action="/indexcheckout" method="GET" enctype="multipart/form-data">
        {{csrf_field()}}
         
          <div class="col-md-11">
                    <span class="input-group-prepend">
                        <p style="text-align:center;"> ID Anda :   <input type="number"  name="search1" id="search1" class="form-control" placeholder="ID Anda" value="{{request()->get('search1')}}"> </p>
                        
                    <p> .<button type="submit"  class="btn btn-primary mr-1" > <i class="fa fa-search" aria-hidden="true"></i></button> </p>
                    <p> .<a  class="btn btn-primary mr-1" href="{{url('/indexcheckout')}}"> <i class="fa fa-history" aria-hidden="true" ></i></a></p>
                </span>
                </div>
    </form>
</div>
@if(empty(request()->get('search1'))) 
<div class="text-left" color="none">
    <br>
    <i style="font-size:20px;color:orange"> Jika Belum Check in, Silahkan <a href="{{url('checkin/create')}}">Check In</a> Terlebih  Dahulu</i> 
    <br>
    <br>
    <br>
    <br>
</div>
@endif

@if(!empty(request()->get('search1'))) 


{{-- <div class=" row justify-content-center" style="margin-top:50px;" >
    <div style="width:50%">
        
    <table class="table table-hover table-striped">
        
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="background-color:#336699;width:300px; color:white">ID Anda</th> 
                <th  class="text-center "  style="background-color:#336699;width:300px;color:white">Action</th>
            </tr>
        </thead>
            <tbody>
@foreach ($tamu as  $tamus)
        <tr>
            <tr>
            
                <td>{{$tamus->id}}</td>
                <td  class="justify-content-center"> 
                   <button> Checkout</button>
                </td>
               
        @endforeach
           </tr>  
        </tbody>
    </table>
</div>
</div>
 --}}

 @foreach ($tamu as  $tamus)
 @if($tamus->id_status==2)
 <br>
    <div class="alert alert-danger alert-dismissible show fade" id="successMessage">
        
       
        Anda Sudah Check Out !! Silahkan Klik <a   href="{{url('/indexutamaguest')}}"> <i>Home<i></a>
        <div class="alert-body">
            {{-- <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button> --}}
           
        </div>
    </div>
    @endif
@endforeach
<div class="row justify-content-center" style="margin-top:50px;">
    @if(count($tamu))
    


    <div style="width:50%">
        
    <table  class="table table-hover table-striped table-bordered table-sm" >
       
        {{-- <table id="example1" class="table table-bordered table-striped"> --}}
     
         
     <thead class="thead-dark">
            <tr>

                <th class="text-center" scope="col" style="background-color:#336699;">ID Anda</th> 
                <th  class="text-center" scope="col"   style="background-color:#336699;">Action</th>
            </tr>
        </thead>
            <tbody>
@foreach ($tamu as  $tamus)
        <tr>
               @if($tamus->id_status==1)
                    <td>{{$tamus->id}}</td>
                @else
                <td>Sudah Checkout</td>
                @endif
            <td >
            
               @if($tamus->id_status==2)
               <a href="{{ url("checkin/{$tamus->id}/edit") }}" class="btn btn-icon icon-left btn-danger disabled"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> check out</a> 
               @elseif($tamus->id_status==1)
                 <a href="{{ url("checkin/{$tamus->id}/edit") }}" class="btn btn-icon icon-left btn-danger"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> check out</a> 
               @else
                   <i>Null </i>
               @endif
            </td>
           
    @endforeach
       </tr>  
    </tbody>
    @else
    <h5> Data Tidak Ditemukan </h5>
    <div class="text-left" color="none">
        <br>
        <br>
        <i style="font-size:20px;color:orange"> Jika Belum Check in, Silahkan Check in Terlebih  Dahulu</i> <a href="{{url('checkin/create')}}">Checkin</a>
        <br>
        <br>
        <br>
        <br>
    </div>
    
    @endif
    
</table>
</div> 
</div>
  @endif 













@endsection
    @push('page-scripts')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

   @endpush

   @push('after-scripts')
   
  @endpush