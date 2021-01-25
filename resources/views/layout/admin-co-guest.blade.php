@extends('master')
@section('title','Guest Book Nap Info')
@section('content') 
<div class="section-body"> 
    <div class="card-header border-success container ">
                
        <div class="row justify-content-center text-center" style="margin-top:50px;">
    <form action="{{ url("/co/{$guest->id}") }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="card-body-center">
                <h4> Form Check Out Guest </h4>
                <br>
                    <div class="form-group justify-content-center">  
                       
                        
                        <div class="form-group">
                            <br/>                            
                            <label>Date out : </label>
                            <div id="time" style="background-color: #ecf0f1; border: 1px dashed grey; height: auto; margin: 1px 0px; padding: 3px; text-align: left; width: auto;">   
                            </div>  
                            {{--<input type="text" class="form-control" name="datein"  value="{{$guest->datein}}" disabled> --}}
                        </div>
                   
                    <div class="text-center" color="none">
                        <br>
                        <a class="btn btn-outline-info" href="{{ url('/')}}" > Back </a>
                        {{-- <button class="btn btn-secondary mr-1" type="reset"> Reset </button> --}}
                        
                        <button class="btn btn-primary mr-1" type="submit"> Submit </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
@push('page-scripts')
@endpush
