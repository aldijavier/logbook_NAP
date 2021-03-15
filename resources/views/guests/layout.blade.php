<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guests Book</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link href="{{asset('css/background.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('after_style')
</head>
{{-- <body style="background-image: url('{{ asset('images') }}/back.jpg'); opacity: 4;"> --}}

<body>
    <nav style="background-color: #151A48" class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-white" href="/guests">
            <img src="{{ asset('images') }}/matrixlogo.png" alt="" width="120" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="margin-left: 150px;"></span>
        </button>
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link btn pull-right text-white" href="#">Guests Book</i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn pull-right text-white" href="/guests/chooseuser">Tambah tamu <i
                            class="fa fa-group"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn pull-right text-white" href="/guests/checkout">Checkout <i
                            class="fa fa-sign-out"></i> </a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <footer class="page-footer font-small bg-success" style="margin-top: 9%;"> <!-- 9-->
        <!-- Copyright -->
        <style>
          @media screen and (max-width: 620px) {
          .footer-copyright{
              margin-top: 135px;
          }
        }
        </style>
        <div class="footer-copyright text-center py-3" style="background-color: #151A48">
            <p class="text-white" style="margin-top: 5px;">&copy; PT NAP Info Lintas Nusa. All Rights Reserved. <?php echo date("Y"); ?></p>
            <!-- <p class="text-white">Guests Book <a href="https://nap.net.id/home.html" class="text-white">PT NAP Info Lintas Nusa</a> </p>   -->
        </div>
        <script type="text/javascript">
            function showTime() {
                var date = new Date(),
                    utc = new Date(Date(
                        date.getFullYear(),
                        date.getMonth(),
                        date.getDate(),
                        date.getHours(),
                        date.getMinutes(),
                        date.getSeconds()
                    ));
                document.getElementById('time').innerHTML = utc.toLocaleString();
                //   document.getElementById('time').innerHTML = utc.toLocaleTimeString();
            }
            setInterval(showTime, 1000);
        </script>
        <script>
            function myfun() {
                var a = document.getElementById("mobilenumber").value;
                if (a.charCodeAt(0) == 57) {
                    document.getElementById("messages").innerHTML = "** Dimulai Dari 0 atau 62";
                    return false;
                }
            }
        </script>
        <script> 

            $("#test").on("input", function() {
              if (/^9/.test(this.value)) {
                this.value = this.value.replace(/^9/, "0")
              }
              if (/^8/.test(this.value)) {
                this.value = this.value.replace(/^8/, "0")
              }
              if (/^7/.test(this.value)) {
                this.value = this.value.replace(/^7/, "0")
              }
              if (/^61/.test(this.value)) {
                this.value = this.value.replace(/^61/, "62")
              }
              if (/^63/.test(this.value)) {
                this.value = this.value.replace(/^63/, "62")
              }
              if (/^64/.test(this.value)) {
                this.value = this.value.replace(/^64/, "62")
              }
              if (/^66/.test(this.value)) {
                this.value = this.value.replace(/^66/, "62")
              }
              if (/^67/.test(this.value)) {
                this.value = this.value.replace(/^67/, "62")
              }
              if (/^68/.test(this.value)) {
                this.value = this.value.replace(/^68/, "62")
              }
              if (/^69/.test(this.value)) {
                this.value = this.value.replace(/^69/, "62")
              }
              if (/^60/.test(this.value)) {
                this.value = this.value.replace(/^60/, "62")
              }
          
              if (/^5/.test(this.value)) {
                this.value = this.value.replace(/^5/, "0")
              }
              if (/^4/.test(this.value)) {
                this.value = this.value.replace(/^4/, "0")
              }
              if (/^3/.test(this.value)) {
                this.value = this.value.replace(/^3/, "0")
              }
              if (/^2/.test(this.value)) {
                this.value = this.value.replace(/^2/, "0")
              }
              if (/^1/.test(this.value)) {
                this.value = this.value.replace(/^1/, "0")
              }
            })
            </script>           
        <!-- Copyright -->
    </footer>
    @yield('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</body>

</html>