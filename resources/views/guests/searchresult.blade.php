@extends('guests.layout')
@section('after_style')
@endsection
@section('content')
@include('guests.pesan')
<link href="{{asset('css/ratingkedua.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
{{-- <link href="{{asset('css/rating2.css')}}" rel="stylesheet" type="text/css"> --}}
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
    integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
</script>
<link href="{{asset('css/backlight.css')}}" rel="stylesheet" type="text/css">
<div class="container" style="margin-top: 3%;">
        <form action="{{route('search')}}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Find Guest"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-success"  style="margin-left: 10px;"> 
                        <span class="glyphicon glyphicon-search">Cari</span>
                    </button>
                </span>
            </div>
        </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="container" style="margin-top: 3%;">
                <h3 class="text-center" >Hasil Pencarian</h3>
            </div> --}}
            <header class='header text-center' style="margin-top: 10px;">
                <h3>How satisfied are you with our service?</h3>
                <p><b>Let us know, to improve our service performance</b></p>
            </header>
            @if ($guests)
            @foreach ($guests as $guest)
            
            
            <form action="{{ route('guests.destroy',$guest->id) }}" method="POST">
                <div class="row justify-content-center" style="text-align: center">    
                    
                <section>
                <div class="row">
                    <div class="col-3" id="servicequalitybut">
                        <input class="star star-4" id="star-4" type="radio" name="service_quality" value="4"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="service_quality" value="3"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="service_quality" value="2"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="service_quality" value="1"/>
                        <label class="star star-1" for="star-1"></label><br><br><br>
                        <p class="col-12">Service of Maintaning Customer Data Security</p>
                      </div>
                      <div class="col-3" id="infqualitybut">
                        <input class="star star-4" id="star-42" type="radio" name="infrastructure_quality" value="4"/>
                        <label class="star star-4" for="star-42"></label>
                        <input class="star star-3" id="star-32" type="radio" name="infrastructure_quality" value="3"/>
                        <label class="star star-3" for="star-32"></label>
                        <input class="star star-2" id="star-22" type="radio" name="infrastructure_quality" value="2"/>
                        <label class="star star-2" for="star-22"></label>
                        <input class="star star-1" id="star-12" type="radio" name="infrastructure_quality" value="1"/>
                        <label class="star star-1" for="star-12"></label>
                        <p style="text-align: center">Quality of Infrastructure</p>
                      </div>
                      <div class="col-3" id="cleanqualitybut">
                        <input class="star star-4" id="star-43" type="radio" name="clean_quality" value="4"/>
                        <label class="star star-4" for="star-43"></label>
                        <input class="star star-3" id="star-33" type="radio" name="clean_quality" value="3"/>
                        <label class="star star-3" for="star-33"></label>
                        <input class="star star-2" id="star-23" type="radio" name="clean_quality" value="2"/>
                        <label class="star star-2" for="star-23"></label>
                        <input class="star star-1" id="star-13" type="radio" name="clean_quality" value="1"/>
                        <label class="star star-1" for="star-13"></label>
                        <p style="text-align: center">Service for In and Out Equipment </p>
                        </div>
                        <div class="col-3" id="visitdatacenter">
                            <input class="star star-4" id="star-444" type="radio" name="visitdatacenterint" value="4"/>
                            <label class="star star-4" for="star-444"></label>
                            <input class="star star-3" id="star-333" type="radio" name="visitdatacenterint" value="3"/>
                            <label class="star star-3" for="star-333"></label>
                            <input class="star star-2" id="star-222" type="radio" name="visitdatacenterint" value="2"/>
                            <label class="star star-2" for="star-222"></label>
                            <input class="star star-1" id="star-111" type="radio" name="visitdatacenterint" value="1"/>
                            <label class="star star-1" for="star-111"></label>
                            <p style="text-align: center">Service for Customer Visits to Data Center </p>
                            </div>
                      </section>
                      </div>
                </div>
              </div>
              </div>
                <div class="row justify-content-center" style="margin-top: 3%;">
                                   
                    {{-- <a href="{{ route('guests.show',$guest->id) }}"> --}}
                    <div class="col-md-4" style="margin-bottom: 3%;">
                        <style>
                            @media screen and (max-width: 620px) {
                            .card{
                                margin-left: 82px;
                            }
                          }
                          @media screen and (max-width: 620px) {
                            .button{
                                margin-left: 150px;
                            }
                          }
                          </style>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('/storage/photos/' . $guest->foto) }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title text-dark">{{ $guest->name }} </h5>
                          <h5 class="card-text text-dark">{{ $guest->datein }} </h5>
                          <label>Date out : </label>
                            <div id="time" style="background-color: #ecf0f1; border: 1px dashed grey; height: auto; margin: 1px 0px; padding: 3px; text-align: left; width: auto;">   
                            </div>  
                          <p class="card-text text-dark">Activity : {{ $guest->activity }}</p>
                          <p class="card-text text-dark">Number Rack: {{ $guest->noRack }}</p>
                          <p class="card-text text-dark">Number Loker: {{ $guest->noLoker }}</p>
                          
                        {{-- <form action="{{ route('guests.destroy',$guest->id) }}" method="POST"> --}}
                        {{-- <a class="btn btn-primary" href="{{ route('guests.edit',$guest->id) }}">Edit</a> --}}
                        @csrf
                        @method('DELETE')
                        <button id="checkoutbutton" type="submit" disabled="true" class="btn btn-danger">Checkout</button>
                      </div>
                    </div>
                    {{-- </a> --}}
                    </div>
                @endforeach
                    {!! $guests->links() !!}
                @endif
                </div>
        </div>
    </div>
</div>
    <!-- end of container -->
@endsection

@section('script')
<script type="text/javascript">
    $("#star-53").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-43").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-33").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-23").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-13").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-52").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-42").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-32").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-22").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-12").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-5").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-4").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-3").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-2").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-1").change(function () {
        $("#checkoutbutton").attr("disabled", true);
    });
    $("#star-444").change(function () {
        $("#checkoutbutton").attr("disabled", false);
    });
    $("#star-333").change(function () {
        $("#checkoutbutton").attr("disabled", false);
    });
    $("#star-222").change(function () {
        $("#checkoutbutton").attr("disabled", false);
    });
    $("#star-1111").change(function () {
        $("#checkoutbutton").attr("disabled", false);
    });
</script>
@endsection

