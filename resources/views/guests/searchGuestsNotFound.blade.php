@extends('guests.layout')
@section('after_style')
@endsection
@section('content')
@include('guests.pesan')
<link href="{{asset('css/success.css')}}" rel="stylesheet" type="text/css">
<br/><br/><br/><br/><br/>
<style>
  @media screen and (max-width: 620px) {
  .footer{
      padding-bottom: 260px;
  }
}

  @media only screen and (min-width: 1401px) {
  .footer{
      margin-bottom: 900px;
  }
}
</style>
<div id="container">
    {{-- <div id="success-box" style="margin-left: 150px;">
      <div class="dot"></div>
      <div class="dot two"></div>
      <div class="face">
        <div class="eye"></div>
        <div class="eye right"></div>
        <div class="mouth happy"></div>
      </div>
      <div class="shadow scale"></div>
      <div class="message"><h1 class="alert">Success!</h1><p>yay, Welcome to NAP Info.</p></div><br/>
      <button class="button-box"><h1 class="green">continue</h1></button>
    </div> --}}
    <div id="error-box" style="margin-right: 90px;">
      <div class="dot"></div>
      <div class="dot two"></div>
      <div class="face2">
        <div class="eye"></div>
        <div class="eye right"></div>
        <div class="mouth sad"></div>
      </div>
      <div class="shadow move"></div>
      <div class="message"><h1 class="alert">Error!</h1><p>oh no, Data Not Found or Already Check out.</div>
      {{-- <button class="button-box"><h1 class="red">try again</h1></button> --}}
      <div class="footer">

      </div>
    </div>

  </div>

  <script>
    setTimeout(function(){
        window.location.href = '/guests/getGuest';
    }, 3000);
</script>
      <!-- end of container -->
@endsection

@section('script')
@endsection