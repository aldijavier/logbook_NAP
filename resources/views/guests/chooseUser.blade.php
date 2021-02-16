@extends('guests.layout')
@section('after_style')
@endsection
@section('content')
@include('guests.pesan')
<link href="{{asset('css/choose.css')}}" rel="stylesheet" type="text/css">
{{-- <link href="{{asset('css/rating2.css')}}" rel="stylesheet" type="text/css"> --}}
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
    integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
</script>

<html>
  <body>
    <article class="flex-container">
      <section class="flex" id="finn">
        <div>
          <figure>
            <img src="{{ asset('images') }}/model.png" alt="" width="105" height="100">
            <figcaption>New Customer? <br/> Register Here!</figcaption>
          </figure>
          
          <button type="button" style="margin-right: 125px;" class="btn btn-dark"><a href="{{ route('guests.create') }}">Here!</a></button>
        </div>
      </section>
      <section class="flex" id="jake">
        <div>
          <figure>
            <img src="{{ asset('images') }}/model.png" alt="" width="105" height="100">
            <figcaption>Returning <br/> Customer</figcaption>
          </figure>
          
          <button style="margin-right: 125px;" type="button" class="btn btn-light"><a href="/guests/getGuest">Here!</a></button>
        </div>
      </section>
    </article>
  </body>
</html>

<!-- end of container -->
@endsection

@section('script')
@endsection
