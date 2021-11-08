@extends('master')
@section('title','Guest Book Nap Info')
@section('content') 
<div class="section-body"> 
    <div class="card-header border-success container ">
                
        <div class="row justify-content-center text-center">
    <form action="{{ url("/guests/{$guest->id}") }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="card-body-center">
                <h4> Edit Data Guest </h4>
                <br>
                    <div class="form-row justify-content-center">  
                        <div>
                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="/image/{{$guest->foto}}"  alt="Card image cap" style="width: 450px; height: 300px;">
                        </div>
                         </div>
                        </div>  
                        <div class="form-row justify-content-center"> 
            
                        <div class="form-group col-md-6">
                            <br>
                            <label @error('name') class="text-danger" @enderror>Name* @error('name') | {{$message}} @enderror </label>
                            <input type="text" class="form-control"  placeholder="Name" name="name" value="{{old('name',$guest->name)}}">
                        </div>
                       
                        <div class="form-group col-md-6">
                            <br/>
                            <label @error('lokasi_id') class="text-danger" @enderror>Lokasi* : @error('lokasi_id') | {{$message}} @enderror </label>
                            <select name="lokasi_id"class="form-control" >
                                {{-- <option value="">-- Pilih Lokasi --</option>
                                {{-- <option value="Plaza Kuningan" @if($guest->lokasi=='Plaza Kuningan') selected='selected' @endif {{ old('lokasi') == "Plaza Kuningan" ? 'selected' : '' }}>Plaza Kuningan</option> --}}
                                {{-- <option value="Cyber" @if($guest->lokasi=='Cyber') selected='selected' @endif {{ old('lokasi') == "Cyber" ? 'selected' : '' }}>Cyber</option> --}}
                        
                            <option value="">- Pilih Lokasi -</option>

                            @foreach ($lokasis as $lokasi )
                            <option value="{{$lokasi->id}}"  @if($lokasi->id==$guest->lokasi_id) selected='selected' @endif  >
                             
                                {{-- @if($guest->lokasi_id=='{{$lokasi->id}}') selected='selected' @endif  {{old('lokasi_id')==$lokasi->id? 'selected' :null}}> --}}
                                {{$lokasi->lokasi}}</option>
                            
                            @endforeach
                              
                            </select>
                        </div>
                    </div> 
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6">
                            <label @error('company') class="text-danger" @enderror>Company* @error('company') | {{$message}} @enderror</label>
                            <input type="text" class="form-control"  placeholder="Company" name="company" value="{{old('comapny',$guest->company)}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label @error('telephone') class="text-danger" @enderror>Telephone* @error('telephone') | {{$message}} @enderror</label>
                            <input type="number" class="form-control"  placeholder="Telephone" name="telephone" value="{{old('telephone',$guest->telephone)}}" onKeyPress="if(this.value.length==13) return false">
                        </div>
                    </div>
                    <div class="form-row">
                      
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="text" class="form-control"  placeholder="Email" name="email" value="{{old('email',$guest->email)}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>No Rack</label>
                            <input type="text" class="form-control"  placeholder="No Rack" name="noRack" value="{{old('noRack',$guest->noRack)}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Activity</label>
                            <select name="activity" class="form-control" >
                                <option value="">-- Pilih Activity --</option>
                                <option value="Instalasi" @if($guest->activity=='Instalasi') selected='selected' @endif {{ old('activity') == "Instalasi" ? 'selected' : '' }}>Instalasi</option>
                                <option value="Maintenance" @if($guest->activity=='Maintenance') selected='selected' @endif {{ old('activity') == "Maintenance" ? 'selected' : '' }}>Maintenance</option>
                                <option value="Troubleshoot" @if($guest->activity=='Troubleshoot') selected='selected' @endif {{ old('activity') == "Troubleshoot" ? 'selected' : '' }}>Troubleshoot</option>
                                <option value="Masuk Barang" @if($guest->activity=='Masuk Barang') selected='selected' @endif {{ old('activity') == "Masuk Barang" ? 'selected' : '' }}>Masuk Barang</option>
                                <option value="Keluar Barang" @if($guest->activity=='Keluar Barang') selected='selected' @endif {{ old('activity') == "Keluar Barang" ? 'selected' : '' }}>Keluar Barang</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress" @error('remarks') class="text-danger" @enderror>Remarks* @error('remarks') | {{$message}} @enderror</label>
                            <input type="text" class="form-control"  placeholder="Remarks" name="remarks" value="{{old('remarks',$guest->remarks)}}">
                          </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>No Loker</label>
                            <input type="text" class="form-control"   placeholder="No Loker" name="noLoker" value="{{old('noLoker',$guest->noLoker)}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Foto : </label>
                            <input type="file" class="form-control" name="foto" value="{{$guest->noLoker}}" >
                        </div>
                    </div>
                  

                      {{-- <div class="form-group">
                          <br>
                          <i style="color : orange;"> ID Anda Saat ini : {{$guest->id}} , Silahkan Klik Submit Untuk Update Data dan Melakukan Rating</i>
                      </div> --}}

                    <div class="text-center" color="none">
                        <br>
                        <button class="btn btn-primary mr-1" type="submit"> Submit </button>
                        <button class="btn btn-secondary mr-1" type="reset"> Reset </button>
                        <a class="btn btn-outline-info" href="{{ url('/')}}" > Back </a>
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
