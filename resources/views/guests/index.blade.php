@extends('guests.layout')
@section('after_style')
@endsection
@section('content')
@include('guests.pesan')
<link href="{{asset('css/backlight.css')}}" rel="stylesheet" type="text/css">
{{-- <div class="container" style="margin-top: 3%;">
        <form action="/guests/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Cari Tamu"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search">Cari</span>
                    </button>
                </span>
            </div>
        </form>
</div> --}}
{{-- <div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div> --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container" style="margin-top: 10%;">
                <h3 class="text-center" style="margin-top: -50px;">Daftar tamu terkini</h3>
            </div>
                <div class="row" style="margin-top: 3%;">
                                    @if ($guests)
                    @foreach ($guests as $guest)
                    {{-- <a href="{{ route('guests.show',$guest->id) }}"> --}}
                    <div class="col-md-4" style="margin-bottom: 7%;">
                        
                    <div class="card" style="width: 18rem; height: 30rem">
                    <img class="card-img-top" src="{{ asset('/storage/photos/' . $guest->foto) }}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title text-dark">{{ $guest->name }} </h5>
                        <h5 class="card-text text-dark">{{ $guest->datein }} </h5>
                        <p class="card-text text-dark">Aktivitas : {{ $guest->activity }}</p>
                        <p class="card-text text-dark">Nomor Rack: {{ $guest->noRack }}</p>
                        <p class="card-text text-dark">Nomor Loker: {{ $guest->noLoker }}</p>
                        <div class="card-footer" style="width: 116.5%; padding-left:50px; margin-left:-20px; margin-top: 30px; background-color: #151A48;">
                            <p class="text-white" style="padding-left: 17px; padding-top:1px;">{{ $guest->company }}</p>
                          </div> 
                        {{-- <a class="btn btn-primary" href="{{ route('guests.edit',$guest->id)}}">Edit</a> --}}
                        {{-- @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button> --}}
                      </div>
                    </div>
                    </a>
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

