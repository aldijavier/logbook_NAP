@extends('master')
@section('title','Guest Book Nap Info')
@section('content') 
<div class="section-body">
    <div class="card-header border-success container ">
                
        <div class="row justify-content-center text-center">

    <form action="{{ url('/guests')}}" method="POST" enctype="multipart/form-data" onsubmit="return myfun()">
        @csrf  
        <div class="row">
            <div class="card-body-center">
                <h4> Tambah Data Guest </h4>
                
                <br>
                <div class="form-row justify-content-center">  
                    <div class="form-group col-md-6" >
                        <label>Date in : </label>
                          <div id="time" style="background-color: #ecf0f1; border: 1px dashed grey; height: auto; margin: 1px 0px; padding: 3px; text-align: left; width: auto;">
                          </div>
                          {{-- <input type="text" id="datepicker" name="datein"> --}}
                          {{-- <input type="text" class="form-control" name="datein" disabled value="{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}">  --}}
                    </div>
                    <div class="form-group col-md-6" id="star">
                        <label @error('lokasi_id') class="text-danger" @enderror>Lokasi* :  @error('lokasi_id') | {{$message}} @enderror</label><br>
                            <select name="lokasi_id"class="form-control"  >
                                <option value="">- Pilih Lokasi -</option>

                                @foreach ($lokasis as $lokasi )
                                <option value="{{$lokasi->id}}" {{old('lokasi_id')==$lokasi->id? 'selected' :null}}>{{$lokasi->lokasi}}</option>
                                
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                        <label @error('name') class="text-danger" @enderror>Name* @error('name') | {{$message}} @enderror</label>
                        <input type="text" class="form-control"  value="{{old('name')}}" placeholder="Name"  name="name">
                    </div>
                    <div class="form-group col-md-6">
                        
                        <label id="messages" @error('telephone') class="text-danger" @enderror>Telephone* @error('telephone') | {{$message}} @enderror</label>
                        <input type="text" id="mobilenumber"  value="" class="form-control" value="{{old('telephone')}}" placeholder="Telephone" name="telephone"  onKeyPress="if(this.value.length==13) return false" >
                    <span id="messages"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label @error('company') class="text-danger" @enderror>Company* @error('company') | {{$message}} @enderror </label>
                        <input type="text" class="form-control"  value="{{old('company')}}" placeholder="Company" name="company" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email </label>
                        <input type="text" class="form-control" value="{{old('email')}}"  placeholder="Email" name="email" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Activity</label>
                        <select name="activity"class="form-control" >
                            <option value="">- Pilih Activity -</option>
                            <option value="Instalasi" {{ old('activity') == "Instalasi" ? 'selected' : '' }}>Instalasi</option>
                            <option value="Maintenance" {{ old('activity') == "Maintenance" ? 'selected' : '' }}>Maintenance</option>
                            <option value="Troubleshoot" {{ old('activity') == "Troubleshoot" ? 'selected' : '' }}>Troubleshoot</option>
                            <option value="Masuk Barang" {{ old('activity') == "Masuk Barang" ? 'selected' : '' }}>Masuk Barang</option>
                            <option value="Keluar Barang" {{ old('activity') == "Keluar Barang" ? 'selected' : '' }}>Keluar Barang</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label >No Rack </label>
                        <input type="text" class="form-control" value="{{old('noRack')}}" placeholder="No Rack" name="noRack" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label >No Loker</label>
                        <input type="text" class="form-control" value="{{old('noLoker')}}" placeholder="No Loker" name="noLoker" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Foto* :</label>
                        <input type="file" class="form-control" value="{{old('foto')}}" name="foto"  id="foto" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress" @error('remarks') class="text-danger" @enderror>Remarks* @error('remarks') | {{$message}} @enderror</label>
                    <input type="text" class="form-control" value="{{old('remarks')}}" placeholder="Remarks" name="remarks">
                  </div>

                <div class=" text-center" color="none">
                    <a class="btn btn-outline-info" href="{{ url('/')}}" > Back </a>
                    <button class="btn btn-secondary mr-1" type="reset"> Reset </button>
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
