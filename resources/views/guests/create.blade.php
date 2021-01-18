@extends('guests.layout')
@section('content')
<div class="container" style="margin-bottom: 3%;"><br/>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('GuestController@store') }}" method="post" id="myform">
                {{ csrf_field() }}
                <fieldset>
                    <legend>Tambah Tamu</legend>
                    <div class="row">
                        <div class="col-md-8">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            {{-- @if($errors->has('name')) --}}
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label>Name </label>
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telephone</label>
                                    <input type="text" class="form-control" placeholder="Telephone" name="telephone">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Company </label>
                                    <input type="text" class="form-control" placeholder="Company" name="company">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email </label>
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Activity</label>
                                    <select name="activity"class="form-control" >
                                        <option value="">- Choose Activity -</option>
                                        <option value="Instalasi" {{ old('activity') == "Instalasi" ? 'selected' : '' }}>Instalasi</option>
                                        <option value="Maintenance" {{ old('activity') == "Maintenance" ? 'selected' : '' }}>Maintenance</option>
                                        <option value="Troubleshoot" {{ old('activity') == "Troubleshoot" ? 'selected' : '' }}>Troubleshoot</option>
                                        <option value="Masuk Barang" {{ old('activity') == "Masuk Barang" ? 'selected' : '' }}>Masuk Barang</option>
                                        <option value="Keluar Barang" {{ old('activity') == "Keluar Barang" ? 'selected' : '' }}>Keluar Barang</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No Rack </label>
                                    <input type="text" class="form-control" placeholder="No Rack" name="noRack">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No Loker</label>
                                    <input type="text" class="form-control" placeholder="No Loker" name="noLoker">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <select name="activity"class="form-control" >
                                        <option value="">- Choose Location -</option>
                                        <option value="Plaza Kuningan" {{ old('activity') == "Plaza Kuningan" ? 'selected' : '' }}>Plaza Kuningan</option>
                                        <option value="Menara Kadin Indonesia" {{ old('activity') == "Menara Kadin Indonesia" ? 'selected' : '' }}>Menara Kadin Indonesia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Remarks: </label>
                                    <textarea type="text" class="form-control" placeholder="Leave your comments" name="remarks"></textarea>
                                </div>
                            </div>
                            <style type="text/css">
                                /* .cam {
                                    margin-left: 750px;
                                    border: 5px;
                                    margin-top: -350px;
                                }
                                .takephoto {
                                    padding-top: 10px;
                                    margin-left: 860px;
                                    width: 100%;
                                }
                                .submitForm {
                                    margin-top: 60px;
                                    background-color: #151A48;
                                    color: white;
                                    margin-left: 15px;
                                } */
                                /* .resultFoto {
                                    margin-top: -160px;
                                    margin-left: 400px;
                                    width: 100%;
                                } */
                            </style>
                            <div class="cam">
                                <div id="my_camera" class="rounded"></div>
                            </div><br/>
                            <div class="takephoto">
                                <a href="javascript:void(take_snapshot())" style="margin-left: 90px;" class="btn btn-dark">Ambil foto</a>
                                <input type="hidden" id="foto" name="foto" value="">
                            </div><br/>
                            <div class="resultFoto">
                                <div id="my_result"></div>
                            </div><br/>
                        </div>
                    </div>
        </div><br/>
        <div class="text-center" style="margin-left: 50px;">
            <button class="btn btn-primary mr-1" style="background-color: #151A48" value="submit"> Submit </button>
            <button class="btn btn-secondary" type="reset"> Reset </button>
            <a class="btn btn-outline-info" href="{{ url('/')}}" > Back </a>
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