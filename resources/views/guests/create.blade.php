@extends('guests.layout')
@section('content')
<link href="{{asset('css/required.css')}}" rel="stylesheet" type="text/css">

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
    function submitbtn() {
        getElementById("Submit_id").disabled = true;
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
                                    <button type="button" style="margin-left: 0px;" id='formSave'
                                        onclick="getElementById('guestsid').value=Math.floor(Math.random()*10000)">Create
                                        ID Number</button>
                                    <input style="width: 50%" id="guestsid" name="guestsid" value="{{ old('guestsid')}}"
                                        readOnly required />
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#formSave').one('click', function () {
                                        $(this).attr('disabled', 'disabled');
                                    });
                                });
                            </script>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label>Name<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" required
                                        value="{{ old('name')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telephone<span style="color:red"> *</span></label>
                                    <input id="test" type="tel" pattern="0.+" title="Must start with 0"
                                        class="form-control" placeholder="Telephone" name="telephone"
                                        value="{{ old('telephone')}}" maxlength=13 required>
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
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="{{ old('email')}}"
                                        required>
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
                                    <select name="lokasi_id" id="lokasi_id" class="form-control"
                                        data-dependent="lokasi">
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
                                            <select class="form-control" name="lantai_id" id="lantai_id"
                                                data-dependent="lantai">
                                                <option value="0" selected="true"> Pilih Lantai </option>
                                            </select>

                                        </div>
                                        <div class="col">
                                            Ruang
                                            <select class="form-control" name="ruangan_id" id="ruangan_id"
                                                data-dependent="ruangan">
                                                <option value="0" selected="true"> Pilih Ruangan </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            No. Rack
                                            <input type="text" class="form-control" placeholder="No Rack" name="noRack"
                                                value="{{ old('noRack')}}" required>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $('#lokasi_id').on('change', function (e) {
                                            console.log(e);
                                            var id_lokasi = e.target.value;
                                            $.get('/json-lantai?id=' + id_lokasi, function (data) {
                                                console.log(data);
                                                $('#lantai_id').empty();
                                                $('#lantai_id').append(
                                                    '<option value="0" selected="true"> Pilih Lantai</option>'
                                                );

                                                $('#ruangan_id').empty();
                                                $('#ruangan_id').append(
                                                    '<option value="0" selected="true"> Pilih Ruangan</option>'
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
                                            $.get('/json-ruangan?id_lantai=' + id_lantai, function (
                                                data) {
                                                console.log(data);
                                                $('#ruangan_id').empty();
                                                $('#ruangan_id').append(
                                                    '<option value="0" selected="true"> Pilih Ruangan</option>'
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

{{-- <script type="text/javascript">
    $(document).ready(function(){
 
 // Department Change
 $('#lokasi_id').change(function(){

    // Department id
    var id = $(this).val();

    // Empty the dropdown
    $('#lantai_id').find('option').not(':first').remove();

    // AJAX request 
    $.ajax({
      url: 'getEmployees/'+id,
      type: 'get',
      dataType: 'json',
      success: function(response){

        var len = 0;
        if(response['data'] != null){
          len = response['data'].length;
        }

        if (len>0) {
          // Read data and create &lt;option &gt;
          for (var i = 0; i<len; i++) {

            var id = response['data'][i].id;
            var lokasi = response['data'][i].lokasi;

            var option = "<option value='"+id+"'>"+lokasi+"</option>"; 

            $("#lantai_id").append(option); 
          }
        }

      }
   });
 });

});
</script> --}}
{{-- <script type="text/javascript">
    $(document).ready(function () {
       $('#lokasi_id').change(function () {
         var id = $(this).val();

         $('#lantai_id').find('option').not(':first').remove();

         $.ajax({
            url:'lokasi_id/'+id,
            type:'get',
            dataType:'json',
            success:function (response) {
                var len = 0;
                if (response.data != null) {
                    len = response.data.length;
                }

                if (len>0) {
                    for (var i = 0; i<len; i++) {
                         var id = response.data[i].id;
                         var lokasi = response.data[i].lokasi;

                         var option = "<option value='"+id+"'>"+lokasi+"</option>"; 

                         $("#lantai_id").append(option);
                    }
                }
            }
         })
       });
    });
</script> --}}
@endsection