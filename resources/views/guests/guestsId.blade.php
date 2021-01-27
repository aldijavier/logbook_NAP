@extends('guests.layout')
@section('content')
<link href="{{asset('css/required.css')}}" rel="stylesheet" type="text/css">
<div class="container" style="margin-bottom: 3%;"><br />
    <div class="row">
        <div class="col-md-12">
            @if ($guests)
            @foreach ($guests as $guest)
            <form action="{{ route('guests.store') }}" method="post" id="myform">
                {{ csrf_field() }}
                <fieldset>
                    <legend>Tambah Tamu</legend>
                    <div class="row">
                        <div class="col-md-8">
                            {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label>Date in : </label>
                                    <div id="time"
                                        style="background-color: #ecf0f1; border: 1px dashed grey; height: auto; margin: 1px 0px; padding: 3px; text-align: left; width: auto;">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <p style="margin-bottom: 10px;">Guest ID:<span style="color: red"></span></p>
                                    <button type="button" style="margin-left: 0px;"
                                        onclick="getElementById('guestsid').value=Math.floor(Math.random()*10000)" disabled>Create
                                        ID Number</button>
                                    <input style="width: 50%" id="guestsid" name="guestsid" readonly="readonly" value=" {{ $guest['guestsid'] }} " required disabled/>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label>Name<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" required
                                    value=" {{ $guest['name'] }} " disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telephone<span style="color:red"> *</span></label>
                                    <input id="test" type="tel" pattern="0.+" title="Must start with 0"class="form-control" placeholder="Telephone"
                                        name="telephone" value=" {{ $guest['telephone'] }} " maxlength=13 required disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Company<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Company" name="company"
                                    value=" {{ $guest['company'] }} " required disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email<span style="color:red"> *</span></label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value=" {{ $guest['email'] }} " required disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Activity<span style="color:red"> *</span></label>
                                    <select name="activity" class="form-control">
                                        <option value="">- Choose Activity -</option>
                                        <option value="Instalasi"
                                            {{ old('activity') == "Instalasi" ? 'selected' : '' }}>
                                            Instalasi</option>
                                        <option value="Maintenance"
                                            {{ old('activity') == "Maintenance" ? 'selected' : '' }}>Maintenance
                                        </option>
                                        <option value="Troubleshoot"
                                            {{ old('activity') == "Troubleshoot" ? 'selected' : '' }}>Troubleshoot
                                        </option>
                                        <option value="Masuk Barang"
                                            {{ old('activity') == "Masuk Barang" ? 'selected' : '' }}>Masuk Barang
                                        </option>
                                        <option value="Keluar Barang"
                                            {{ old('activity') == "Keluar Barang" ? 'selected' : '' }}>Keluar Barang
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No Rack<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="No Rack" name="noRack"
                                    value=" {{ $guest['noRack'] }} "required disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No Loker<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="No Loker" name="noLoker"
                                    value=" {{ $guest['noLoker'] }} " required disabled>
                                </div>
                                <div class="form-group col-md-6" id="star">
                                    {{-- <label @error('lokasi_id') class="text-danger" @enderror>Lokasi* :  @error('lokasi_id') | {{$message}}
                                    @enderror</label><br> --}}
                                    {{-- <label class="text-black" @enderror>Lokasi: </label><br> --}}
                                    <label>Lokasi<span style="color:red"> *</span></label>
                                    <select name="lokasi_id" class="form-control">
                                        <option value="">- Pilih Lokasi -</option>

                                        @foreach ($lokasis as $lokasi )
                                        <option value="{{$lokasi->id}}"
                                            {{old('lokasi_id')==$lokasi->id? 'selected' :null}}>
                                            {{$lokasi->lokasi}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Remarks: </label>
                                    <textarea type="text" class="form-control" placeholder="Leave your comments"
                                        name="remarks"></textarea>
                                </div>
                            </div>
                            <div class="cam">
                                <div id="my_camera" class="rounded"></div>
                            </div><br />
                            <div class="takephoto">
                                <a href="javascript:void(take_snapshot())" style="margin-left: 90px;"
                                    class="btn btn-dark">Ambil foto</a>
                                <input type="hidden" id="foto" name="foto" value="">
                            </div><br />
                            <div class="resultFoto">
                                <div id="my_result"></div>
                            </div><br />
                            
                        </div>
                    </div><br />
                    <div class="text-center" style="margin-left: 50px;">
                        <button type="submit" class="btn btn-primary mr-1" style="background-color: #151A48" value="submit"> Submit
                        </button>
                        {{-- <button class="btn btn-secondary" type="reset"> Reset </button> --}}
                        <a style="margin-left: 5px;" class="btn btn-outline-info" href="{{ url('/')}}"> Back </a>
                    </div>
                </fieldset>
                @endforeach
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js') }}/webcam.min.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 240,
        dest_width: 320,
        dest_height: 240,
        image_format: 'png',
        jpeg_quality: 90,
        force_flash: false
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function (data_uri, canvas, context) {
            document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
            var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
            document.getElementById('foto').value = raw_image_data;
            console.log(raw_image_data);
        });
    }
</script>
@endsection