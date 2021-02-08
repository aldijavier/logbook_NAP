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

<div class="container">
    <header class='header text-center' style="margin-top: 10px;">
        <h3>How satisfied are you with our service?</h3>
        <p><b>Let us know, to improve our service performance</b></p>
    </header>
    <div class="stars">
        <form action="">
        <section>
          <input class="star star-5" id="star-5" type="radio" name="star"/>
          <label class="star star-5" for="star-5"></label>
          <input class="star star-4" id="star-4" type="radio" name="star"/>
          <label class="star star-4" for="star-4"></label>
          <input class="star star-3" id="star-3" type="radio" name="star"/>
          <label class="star star-3" for="star-3"></label>
          <input class="star star-2" id="star-2" type="radio" name="star"/>
          <label class="star star-2" for="star-2"></label>
          <input class="star star-1" id="star-1" type="radio" name="star"/>
          <label class="star star-1" for="star-1"></label>
          <p style="text-align: center">Kebersihan</p>
        </section>
        <section>
          <input class="star star-5" id="star-52" type="radio" name="star2"/>
          <label class="star star-5" for="star-52"></label>
          <input class="star star-4" id="star-42" type="radio" name="star2"/>
          <label class="star star-4" for="star-42"></label>
          <input class="star star-3" id="star-32" type="radio" name="star2"/>
          <label class="star star-3" for="star-32"></label>
          <input class="star star-2" id="star-22" type="radio" name="star2"/>
          <label class="star star-2" for="star-22"></label>
          <input class="star star-1" id="star-12" type="radio" name="star2"/>
          <label class="star star-1" for="star-12"></label>
          <p style="text-align: center">Keamanan</p>
        </section>
        <section>
            <input class="star star-5" id="star-53" type="radio" name="star3"/>
            <label class="star star-5" for="star-53"></label>
            <input class="star star-4" id="star-43" type="radio" name="star3"/>
            <label class="star star-4" for="star-43"></label>
            <input class="star star-3" id="star-33" type="radio" name="star3"/>
            <label class="star star-3" for="star-33"></label>
            <input class="star star-2" id="star-23" type="radio" name="star3"/>
            <label class="star star-2" for="star-23"></label>
            <input class="star star-1" id="star-13" type="radio" name="star3"/>
            <label class="star star-1" for="star-13"></label>
            <p style="text-align: center">Kepuasaan</p>
          </section>
        </form>
      </div>
</div>
<!-- end of container -->
@endsection

@section('script')
@endsection
