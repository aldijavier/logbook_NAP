@extends('guests.layout')
@section('content')
<link href="{{asset('css/required.css')}}" rel="stylesheet" type="text/css">

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
function submitbtn(){
    getElementById("Submit_id").disabled=true;
//Validation code goes here
}
</script>

<div class="container" style="margin-bottom: 3%;"><br />
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('GuestController@store') }}" method="post" id="myform">
                {{ csrf_field() }}
                <fieldset>
                    <legend>Tambah Tamu</legend>
                    <div class="row">
                        <div class="col-md-8">
                            {{-- menampilkan error validasi --}}
                            @if ($guests)
                            @foreach ($guests as $guest)
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
                                    <div  id="time"
                                        style="background-color: #ecf0f1; border: 1px dashed grey; height: auto; margin: 1px 0px; padding: 3px; text-align: left; width: auto;">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <p style="margin-bottom: 10px;">Guest ID:<span style="color: red"></span></p>
                                    <button type="button" style="margin-left: 0px;"
                                        onclick="getElementById('guestsid').value=Math.floor(Math.random()*10000)" disabled>Create
                                        ID Number</button>
                                    <input style="width: 50%" id="guestsid" name="guestsid" readonly="readonly" value="{{ $guest['guestsid'] }}"/>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label>Name<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                    value="{{ $guest['name'] }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telephone<span style="color:red"> *</span></label>
                                    <input id="test" title="Must start with 0 / 62 / 65"
                                        class="form-control" placeholder="Telephone" name="telephone"
                                        value="{{ old('telephone')}}" value="{{ $guest['telephone'] }}" maxlength=13 required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Company<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Company" name="company"
                                    value="{{ $guest['company'] }}" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email<span style="color:red"> *</span></label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="{{ $guest['email'] }}" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Activity<span style="color:red"> *</span></label>
                                    <select name="activity" class="form-control">
                                        <option value="">- Choose Activity -</option>
                                        <option value="Instalasi"
                                            {{ old('activity') == "Instalasi" ? 'selected' : '' }}>
                                            Installation</option>
                                        <option value="Maintenance"
                                            {{ old('activity') == "Maintenance" ? 'selected' : '' }}>Maintenance
                                        </option>
                                        <option value="Troubleshoot"
                                            {{ old('activity') == "Troubleshoot" ? 'selected' : '' }}>Troubleshoot
                                        </option>
                                        <option value="Masuk Barang"
                                            {{ old('activity') == "Masuk Barang" ? 'selected' : '' }}>Stuff IN
                                        </option>
                                        <option value="Keluar Barang"
                                            {{ old('activity') == "Keluar Barang" ? 'selected' : '' }}>Stuff Out
                                        </option>
                                        <option value="Survey"
                                            {{ old('activity') == "Survey" ? 'selected' : '' }}>Survey
                                        </option>
                                        <option value="Terminated"
                                            {{ old('activity') == "Terminated" ? 'selected' : '' }}>Terminated
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" id="star">
                                    {{-- <label @error('lokasi_id') class="text-danger" @enderror>Lokasi* :  @error('lokasi_id') | {{$message}}
                                    @enderror</label><br> --}}
                                    {{-- <label class="text-black" @enderror>Lokasi: </label><br> --}}
                                    <label>Location<span style="color:red"> *</span></label>
                                    <select name="lokasi_id" id="lokasi_id" class="form-control" data-dependent="lokasi">
                                        <option value="">- Pilih Lokasi -</option>
                                        @foreach ($lokasi as $lokasi)
                                            <option value="{{ $lokasi->id }}">{{ $lokasi->lokasi }}</option>
                                        @endforeach
                                        {{-- @foreach ($lokasis as $lokasi )
                                        <option value="{{$lokasi->id}}"
                                            {{old('lokasi_id')==$lokasi->id? 'selected' :null}}>
                                            {{$lokasi->lokasi}}</option>

                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No Loker</label>
                                    <input type="text" class="form-control" placeholder="No Loker" name="noLoker"
                                    >
                                </div>
                                {{-- <label>No Rack<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="No Rack" name="noRack"
                                        value="{{ old('noRack')}}" required> --}}
                                <div class="form-group col-md-6">
                                    <div class="row align-items-start" style="margin-left: 15px;">
                                        <div class="col"> 
                                          Floor <span style="color:red"> *</span>
                                          <select class="form-control" name="lantai_id" id="lantai_id" data-dependent="lantai">
                                                <option value="0" selected="true"> Pilih Lantai </option>
                                        </select>

                                        </div>
                                        <div class="col">
                                          Room <span style="color:red"> *</span>
                                          <select class="form-control" name="ruangan_id" id="ruangan_id" data-dependent="ruangan">
                                            <option value="0" selected="true"> Pilih Ruangan </option>
                                    </select>
                                        </div>
                                        <div class="col">
                                          No. Rack
                                          <input type="text" class="form-control" placeholder="No Rack" name="noRack"
                                          >
                                        </div>
                                      </div>
                                </div>
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $('#lokasi_id').on('change', function (e) {
                                            console.log(e);
                                            var id_lokasi = e.target.value;
                                            $.get('{{ route('jsonLantai')}}?id=' + id_lokasi, function (data) {
                                                console.log(data);
                                                $('#lantai_id').empty();
                                                $('#lantai_id').append(
                                                    '<option value="0" selected="true"> Choose Floor</option>'
                                                );

                                                $('#ruangan_id').empty();
                                                $('#ruangan_id').append(
                                                    '<option value="0" selected="true"> Choose Room</option>'
                                                );

                                                $.each(data, function (index, lantaiObj) {
                                                    $('#lantai_id').append(
                                                        '<option value="' +
                                                        lantaiObj.id_lantai + '">' +
                                                        lantaiObj.name_lantai +
                                                        '</option>');
                                                })
                                            });
                                        });

                                        $('#lantai_id').on('change', function (e) {
                                            console.log(e);
                                            var id_lantai = e.target.value;
                                            $.get('{{ route('jsonRuang')}}?id_lantai=' + id_lantai, function (
                                                data) {
                                                console.log(data);
                                                $('#ruangan_id').empty();
                                                $('#ruangan_id').append(
                                                    '<option value="0" selected="true"> Choose Room</option>'
                                                );

                                                $.each(data, function (index, ruanganObj) {
                                                    $('#ruangan_id').append(
                                                        '<option value="' +
                                                        ruanganObj.id_ruang + '">' +
                                                        ruanganObj.name_ruang +
                                                        '</option>');
                                                })
                                            });
                                        });
                                    });
                                </script>

                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Remarks: </label>
                                    <textarea type="text" class="form-control" placeholder="Leave your comments"
                                        name="remarks"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Access Card: <span style="color:red"> *</span> </label>
                                    <input type="text" class="form-control" placeholder="Input your access card number"
                                        name="access"/>
                                </div>
                            </div>
                            <div class="cam">
                                <div id="my_camera" class="rounded"></div>
                            </div><br />
                            <div class="takephoto">
                                <a href="javascript:void(take_snapshot())" style="margin-left: 90px;"
                                    class="btn btn-dark">Take a picture</a>
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
                        <a style="margin-left: 5px;" class="btn btn-outline-info" href="{{ url('/guests/getGuest')}}"> Back </a>
                    </div>
                </fieldset>
            </form>
            @endforeach
            @endif
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