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
        <form action="/guests/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Cari Tamu"> <span class="input-group-btn">
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
            <div class="stars">
                <form action="{{ route('guests.destroy',$guest->id) }}" method="POST">
                <section>
                  <input class="star star-5" id="star-5" type="radio" name="service_quality" value="Sangat Memuaskan"/>
                  <label class="star star-5" for="star-5"></label>
                  <input class="star star-4" id="star-4" type="radio" name="service_quality" value="Memuaskan"/>
                  <label class="star star-4" for="star-4"></label>
                  <input class="star star-3" id="star-3" type="radio" name="service_quality" value="Cukup Memuaskan"/>
                  <label class="star star-3" for="star-3"></label>
                  <input class="star star-2" id="star-2" type="radio" name="service_quality" value="Kurang Memuaskan"/>
                  <label class="star star-2" for="star-2"></label>
                  <input class="star star-1" id="star-1" type="radio" name="service_quality" value="Tidak Memuaskan"/>
                  <label class="star star-1" for="star-1"></label>
                  <p style="text-align: center">Service Quality</p>
                </section>
                <section>
                  <input class="star star-5" id="star-52" type="radio" name="infrastructure_quality" value="Sangat Memuaskan"/>
                  <label class="star star-5" for="star-52"></label>
                  <input class="star star-4" id="star-42" type="radio" name="infrastructure_quality" value="Memuaskan"/>
                  <label class="star star-4" for="star-42"></label>
                  <input class="star star-3" id="star-32" type="radio" name="infrastructure_quality" value="Cukup Memuaskan"/>
                  <label class="star star-3" for="star-32"></label>
                  <input class="star star-2" id="star-22" type="radio" name="infrastructure_quality" value="Kurang Memuaskan"/>
                  <label class="star star-2" for="star-22"></label>
                  <input class="star star-1" id="star-12" type="radio" name="infrastructure_quality" value="Tidak Memuaskan"/>
                  <label class="star star-1" for="star-12"></label>
                  <p style="text-align: center">Quality of Infrastructure</p>
                </section>
                <section>
                    <input class="star star-5" id="star-53" type="radio" name="clean_quality" value="Sangat Memuaskan"/>
                    <label class="star star-5" for="star-53"></label>
                    <input class="star star-4" id="star-43" type="radio" name="clean_quality" value="Memuaskan"/>
                    <label class="star star-4" for="star-43"></label>
                    <input class="star star-3" id="star-33" type="radio" name="clean_quality" value="Cukup Memuaskan"/>
                    <label class="star star-3" for="star-33"></label>
                    <input class="star star-2" id="star-23" type="radio" name="clean_quality" value="Kurang Memuaskan"/>
                    <label class="star star-2" for="star-23"></label>
                    <input class="star star-1" id="star-13" type="radio" name="clean_quality" value="Tidak Memuaskan"/>
                    <label class="star star-1" for="star-13"></label>
                    <p style="text-align: center">cleanliness</p>
                  </section>
                
              </div>
                <div class="row" style="margin-top: 3%; margin-left: 400px;">
                                   
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
                          <p class="card-text text-dark">Aktivitas : {{ $guest->activity }}</p>
                          <p class="card-text text-dark">Nomor Rack: {{ $guest->noRack }}</p>
                          <p class="card-text text-dark">Nomor Loker: {{ $guest->noLoker }}</p>
                          
                        {{-- <form action="{{ route('guests.destroy',$guest->id) }}" method="POST"> --}}
                        {{-- <a class="btn btn-primary" href="{{ route('guests.edit',$guest->id) }}">Edit</a> --}}
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Checkout</button>
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
@endsection

