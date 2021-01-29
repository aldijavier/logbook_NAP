@extends('guests.layout')
@section('after_style')
@endsection
@section('content')
@include('guests.pesan')
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
            <div class="container" style="margin-top: 3%;">
                <h3 class="text-center" >Hasil Pencarian</h3>
            </div>

                <div class="row" style="margin-top: 3%;">
                                    @if ($guests)
                    @foreach ($guests as $guest)
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
                        <form action="{{ route('guests.destroy',$guest->id) }}" method="POST">
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

