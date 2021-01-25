@extends('master')
@section('title','Guest Book Nap Info')
@section('content') 
<script type="text/javascript">window.setTimeout("document.getElementById('successMessage').style.display='none';", 2000); </script>

        <div  style="margin-top:175px;" >
            @if(session('message'))
            <div class="alert alert-success alert-dismissible show fade" id="successMessage">
                <div class="alert-body">
                    {{-- <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button> --}}
                    {{session('message')}}
                </div>
            </div>
        @endif
        <div class="container  ">
          
        <div class="row justify-content-center text-center">
            <div class="col-sm-6">
              {{-- <div class="card">
                <div class="card-body" > --}}
                    <a href="{{url('checkin/create')}}">     <button   class="btn btn-info btn-lg" style="width: 20rem; height: 18rem;"><b style="font-size:35px">Check In</b></button></a>
                {{-- </div>
            </div> --}}
          </div>


          <div class="col-sm-6">
            {{-- <div class="card">
              <div class="card-body"> --}}
                <a href="{{url('/indexcheckout')}}">    <button type="link"  class="btn btn-danger btn-lg" style="width: 20rem; height: 18rem;"><b style="font-size:35px">Check Out</b></button></a>
            {{-- </div>
        </div> --}}
      </div>
    </div>
</div>
</div>









@endsection
    @push('page-scripts')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

   @endpush

   @push('after-scripts')
   
  @endpush