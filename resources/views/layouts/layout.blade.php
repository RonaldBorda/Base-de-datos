<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
</head>

<body>
    <!--Inicio barra de navegacion-->
    <nav style="background-color:#E90B3C" class="navbar navbar-light bg-main">
        <div class="container">
            <h1 style="color:white">Copa mundial de la FIFA Qatar 2022</h1>
            <a class="navbar-brand" href="#">
                <img src="{{asset('images/logo.png')}}" width="60" alt="" loading="lazy">
            </a>
        </div>
    </nav><br>
    <!--Fin barra de navegacion-->

    <!--Inicio contenido-->
    @yield('content')

    <!--Fin contenido-->

    <!-- Footer -->
    <footer style="background-color:#D4D4D4" class="container-fluid bg-main">
        <div class="row text-center p-4">
            <div class="mb-3">
                <img src="{{asset('images/logo.png')}}" alt="YouDevs logo" width="50" id="logofooter">
            </div>
            <div id="col-md-10">
                <a href="https://www.facebook.com/qatar2022page">
                    <img src="{{asset('images/facebook.png')}}" class="img-fluid" width="30px" alt="facebook youdevs">
                </a>
                <a href="https://www.instagram.com/youdevs">
                    <img src="{{asset('images/instagram.png')}}" class="img-fluid" width="30px" alt="instagram youdevs">
                </a>
                <a href="https://www.youtube.com/c/YouDevsOficial">
                    <img src="{{asset('images/youtube.png')}}" class="img-fluid" width="35px" alt="youtube youdevs">
                </a>
                <strong>
                    <p class="mt-3">Copyright © 2021 Qatar<br> Todos los derechos reservados.</p>
                </strong>
            </div>
        </div>
    </footer>
    <!--Fin footer-->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>

</body>

</html>
