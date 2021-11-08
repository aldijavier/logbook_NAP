@extends('master2')
@section('after_style')
@endsection
@section('content')
@section('title','Guest Book Nap Info')
@section('content') 
<div class="section-body"> 
    <div class="card-header border-success container ">
                
        <div class="row justify-content-center text-center">
    <form>
        @csrf
        @method('patch')
        <div class="row">
            <div class="card-body-center">
                <h4> View Data Guest </h4>
                <br>
                    <div class="form-row justify-content-center">  
                        <div class="card" style="width:380px">
                            <img class="card-img-top" src="{{ asset('/storage/photos/' . $guest->foto) }}"  alt="Card image cap" style="width: 400px; height: 264px;">
                            <span >{{old('foto',$guest->foto)}}"</span>
                        </div>  
                        
                    </div> 
                    <div class="form-row justify-content-center">
                       
                        <div class="form-group col-md-6">
                            <br>
                            <label>Date In </label>
                            <input type="text" class="form-control"  placeholder="Datein" name="datein" value="{{old('datein',$guest->datein)}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <br>
                            <label>Date Out</label>
                            <input type="text" class="form-control"  placeholder="Dateout" name="dateout" value="{{old('dateout',$guest->dateout)}}" disabled>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                       
                        <div class="form-group col-md-6">
                            
                            <label>Name*  </label>
                            <input type="text" class="form-control"  placeholder="Name" name="name" value="{{old('name',$guest->name)}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            
                            <label class="text" @enderror>Telephone*</label>
                            <input type="number" class="form-control"  placeholder="Telephone" name="telephone" value="{{old('telephone',$guest->telephone)}}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Company* </label>
                            <input type="text" class="form-control"  placeholder="Company" name="company" value="{{old('comapny',$guest->company)}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="text" class="form-control"  placeholder="Email" name="email" value="{{old('email',$guest->email)}}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Activity</label>
                            <input type="text" class="form-control" name="activity" value="{{$guest->activity}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label>No Rack</label>
                            <input type="text" class="form-control"  placeholder="No Rack" name="noRack" value="{{old('noRack',$guest->noRack)}}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>No Loker</label>
                            <input type="text" class="form-control"   placeholder="No Loker" name="noLoker" value="{{old('noLoker',$guest->noLoker)}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Lokasi </label>
                            <input type="text" class="form-control" name="lokasi" value="{{$guest->lokasi}}" disabled >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label >Remarks*</label>
                        <input type="text" class="form-control"  placeholder="Remarks" name="remarks" value="{{old('remarks',$guest->remarks)}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Your ID</label>
                            <input type="text" class="form-control"   placeholder="No Loker" name="noLoker" value="{{old('noLoker',$guest->guestsid)}}" disabled>
                        </div>
                    </div>

                    
                    
                    <div class="text-center" color="none">
                        <br>
                        {{-- <i style="color:orange"> Ingat ID Anda Untuk Bisa Melakukan Rating !! </i> --}}
                        <a class="btn btn-outline-info" href="{{ url('/admin')}}"  > Back </a>
                        
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
