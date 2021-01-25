@extends('master')
@section('title','Guest Book Nap Info')
@section('content') 
<div class="section-body">
    <div class="card-header border-success container ">
        <div class="row justify-content-center text-center">
            <form  method="POST" enctype="multipart/form-data">
            @csrf  
            <div class="row">
                <div class="card-body-center">
                <h4> Form Penilaian </h4>
                <br>
                <div class="form-row justify-content-center">  
                    <div class="form-group col-md-6" >
                        <label>ID Guest</label>
                        <input type="number" class="form-control"  value="{{old('id_guest')}}" placeholder="ID Guest"  name="id_guest">
                          
                    </div>
                    <div class="form-group col-md-6" id="star">
                        <label>Lokasi :</label><br>
                            <select name="lokasi_id"class="form-control"  >
                                <option value="">- Pilih Lokasi -</option>

                                @foreach ($lokasis as $lokasi )
                                <option value="{{$lokasi->id}}" {{old('lokasi_id')==$lokasi->id? 'selected' :null}}>{{$lokasi->lokasi}}</option>
                                
                                @endforeach
                            </select>
                    </div>
                </div>
               
                  <div >
                  
                    @foreach ($kriterias as $kriteria)
                    <div class="form-group">
                        <label name="id_kriteria" value="{{$kriteria->id}}">   {{$kriteria->nama_kriteria}} <span class="required">* </span></label>
                                    {{-- <div class="star"> --}}
                                      {{-- @foreach($bobots  as $bobot)
                                         <input type="radio"   name="id_bobot" id="id_bobot"  value="{{$bobot->bobot}}">  {{$bobot->nama_sub}}
                                        @endforeach --}}
                            <select class="form-control" name="id_bobot" id="id_bobot" required>
                                <option value> Pilih Bobot </option>
                                @foreach($bobots  as $bobot)
                                @if($kriteria->id == $bobot->id_kriteria)
                                <option value="{{$bobot->bobot}}" >{{$bobot->nama_sub}}</option>
                                            {{-- <input type="radio"   name="id_bobot"  value="{{$bobot->bobot}}"> --}}

                
                                @endif
                                @endforeach
                            </select>

                            
                        {{-- </div> --}}
                    </div>
                    
                    @endforeach
                  
                </div>
                <div class="form-group">
                    <label>Saran / keterangan</label>
                        <input type="text" class="form-control"  value="{{old('keterangan')}}" placeholder="Saran / Keterangan"  name="keterangan">
                        <br>
                </div>

                <div class=" text-center" color="none">
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
