<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{asset('js/loginAdmin.js')}}" rel="stylesheet" type="text/css"> --}}
    <link href="{{asset('css/loginAdmin.css')}}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
                    $('#login-button').click(function () {
                        $('#login-button').fadeOut("slow", function () {
                            $("#container").fadeIn();
                            TweenMax.from("#container", .4, {
                                scale: 0,
                                ease: Sine.easeInOut
                            });
                            TweenMax.to("#container", .4, {
                                scale: 1,
                                ease: Sine.easeInOut
                            });
                        });
                    });

                    $(".close-btn").click(function () {
                        TweenMax.from("#container", .4, {
                            scale: 1,
                            ease: Sine.easeInOut
                        });
                        TweenMax.to("#container", .4, {
                            left: "0px",
                            scale: 0,
                            ease: Sine.easeInOut
                        });
                        $("#container, #forgotten-container").fadeOut(800, function () {
                            $("#login-button").fadeIn(800);
                        });
                    });

                    /* Forgotten Password */
                    $('#forgotten').click(function () {
                        $("#container").fadeOut(function () {
                            $("#forgotten-container").fadeIn();
                        });
                    });
                  });
    </script>
    <title>Login Administrator</title>
</head>

<body>
    <div id="login-button">
        <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
        </img>
    </div>
    <div id="container">
        <h1 style="margin-top: 20px;">Login Admin</h1>
        <span class="close-btn">
            <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
        </span>

        <form action="/postlogin" method="post" id="myformlogin">
          {{csrf_field()}}
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Log In</button>
            <div id="remember-container">
                <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked" />
                <span id="remember">Remember me</span>
                {{-- <span id="forgotten">Forgotten password</span> --}}
            </div>
        </form>
    </div>

    <!-- Forgotten Password Container -->
    <div id="forgotten-container">
        <h1>Forgotten</h1>
        <span class="close-btn">
            <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
        </span>

        <form>
            <input type="email" name="email" placeholder="E-mail">
            <a href="#" class="orange-btn">Get new password</a>
        </form>
    </div>
</body>

</html>