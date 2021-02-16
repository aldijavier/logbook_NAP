@extends('guests.layout')
@section('content')
<link href="{{asset('css/required.css')}}" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                                    {{-- <button class="disable" type="button" style="margin-left: 0px;" id='btnTest'
                                        onclick="getElementById('guestsid').value=Math.floor(Math.random()*10000)">Create
                                        ID Number</button> --}}
                                    <input onclick="getElementById('guestsid').value=Math.floor(Math.random()*10000); var e=this;setTimeout(function(){e.disabled=true;},0);return true;" style="width: 50%" id="guestsid" name="guestsid" readonly="readonly" value="{{ old('guestsid')}}" required />
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label>Name<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" required
                                        value="{{ old('name')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telephone<span style="color:red"> *</span></label>
                                    <input id="test" type="tel" pattern="0.+" title="Must start with 0"class="form-control" placeholder="Telephone"
                                        name="telephone" value="{{ old('telephone')}}" maxlength=13 required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Company<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Company" name="company"
                                        value="{{ old('company')}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email<span style="color:red"> *</span></label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="{{ old('email')}}" required>
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
                                    <label>No Loker<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="No Loker" name="noLoker"
                                        value="{{ old('noLoker')}}" required>
                                </div>
                                {{-- <label>No Rack<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="No Rack" name="noRack"
                                        value="{{ old('noRack')}}" required> --}}
                                <div class="form-group col-md-6">
                                    <div class="row align-items-start" style="margin-left: 15px;">
                                        <div class="col">
                                          Lantai
                                          <select name="lokasi_id" class="form-control">
                                            <option value="">- Pilih Lokasi -</option>
    
                                            @foreach ($lokasis as $lokasi )
                                            <option value="{{$lokasi->id}}"
                                                {{old('lokasi_id')==$lokasi->id? 'selected' :null}}>
                                                {{$lokasi->lokasi}}</option>
    
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="col">
                                          Ruang
                                          <select name="lokasi_id" class="form-control">
                                            <option value="">- Pilih Lokasi -</option>
    
                                            @foreach ($lokasis as $lokasi )
                                            <option value="{{$lokasi->id}}"
                                                {{old('lokasi_id')==$lokasi->id? 'selected' :null}}>
                                                {{$lokasi->lokasi}}</option>
    
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="col">
                                          No. Rack
                                          <input type="text" class="form-control" placeholder="No Rack" name="noRack"
                                        value="{{ old('noRack')}}" required>
                                        </div>
                                      </div>
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
                    <?php 
                    if (isset($_POST['submit'])) {
                    // mengambil nomor handphone telah diinput
                    $handphone = $_POST['handphone'];
                    // menghitung jumlah digit nomor handphone tanpa kode negara (+62)
                    $jumlah_digit_handphone = strlen(substr($handphone, 3));
                    // nomor handphone yang ditampilkan jika berjumlah 9 digit
                    if ($jumlah_digit_handphone == 9) {
                        $tampil_handphone = "+62 " . substr($handphone, 3, 3) . "-" . substr($handphone, 6, 3) . "-" . substr($handphone, 9, 3);
                    }
                    // nomor handphone yang ditampilkan jika berjumlah 10 digit
                    if ($jumlah_digit_handphone == 10) {
                        $tampil_handphone = "+62 " . substr($handphone, 3, 3) . "-" . substr($handphone, 6, 4) . "-" . substr($handphone, 10, 3);
                    }
                    // nomor handphone yang ditampilkan jika berjumlah 11 digit
                    if ($jumlah_digit_handphone == 11) {
                        $tampil_handphone = "+62 " . substr($handphone, 3, 3) . "-" . substr($handphone, 6, 4) . "-" . substr($handphone, 10, 4);
                    }
                    // nomor handphone yang ditampilkan jika berjumlah 12 digit
                    if ($jumlah_digit_handphone == 12) {
                        $tampil_handphone = "+62 " . substr($handphone, 3, 3) . "-" . substr($handphone, 6, 4) . "-" . substr($handphone, 10, 5);
                    }
                    // validasi inputan nomor handphone
                    if (!preg_match("/^[0-9|(\+|)]*$/", $handphone) OR strlen(strpos($handphone, "+", 1)) > 0) {
                        echo "<strong>Handphone hanya boleh menggunakan angka dan diawali simbol +</strong>";
                    }
                    else if (substr($handphone, 0, 3) != "+62" ) {
                        echo "<strong>Handphone harus diawali dengan kode negara +62</strong>";
                    }
                    else if (substr($handphone, 3, 1) == "0" ) {
                        echo "<strong>Handphone tidak boleh diikuti dengan angka 0 setelah kode negara</strong>";
                    }
                    else {
                    // menampilkan nomor handphone
                        echo "<strong>Handphone : $tampil_handphone</strong>";
                    }                
                }
                ?>
                    <div class="text-center" style="margin-left: 50px;">
                        <button class="btn btn-primary mr-1" style="background-color: #151A48" value="submit"> Submit
                        </button>
                        <button class="btn btn-secondary" type="reset"> Reset </button>
                        <a style="margin-left: 5px;" class="btn btn-outline-info" href="{{ url('/')}}"> Back </a>
                    </div>
                </fieldset>
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