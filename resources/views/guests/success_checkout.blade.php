@extends('guests.layout')
@section('after_style')
@endsection
@section('content')
<link href="{{asset('css/success.css')}}" rel="stylesheet" type="text/css">
<br/><br/><br/><br/><br/>
<div id="container">
    <div id="success-box" style="margin-left: 150px;">
      <div class="dot"></div>
      <div class="dot two"></div>
      <div class="face">
        <div class="eye"></div>
        <div class="eye right"></div>
        <div class="mouth happy"></div>
      </div>
      <div class="shadow scale"></div>
      <div class="message"><h1 class="alert">Success!</h1><p>yay, Thank you for coming.</p></div><br/>
      {{-- <button class="button-box"><h1 class="green">continue</h1></button> --}}
    </div>
    {{-- <div id="error-box">
      <div class="dot"></div>
      <div class="dot two"></div>
      <div class="face2">
        <div class="eye"></div>
        <div class="eye right"></div>
        <div class="mouth sad"></div>
      </div>
      <div class="shadow move"></div>
      <div class="message"><h1 class="alert">Error!</h1><p>oh no, something went wrong.</div>
      <button class="button-box"><h1 class="red">try again</h1></button>
    </div> --}}
  </div>
  <script>
    setTimeout(function(){
        window.location.href = "{{ route('index')}}";
    }, 5000);
</script>
      <!-- end of container -->
@endsection

@section('script')
@endsection