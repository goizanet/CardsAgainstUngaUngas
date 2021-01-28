<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    @yield('custom-css')

    <title>@yield('titulo', 'Panel de administracion')</title>
    <link rel="icon" href="/assets/logoDF.png" type="image/png">

</head>

<body class="container-fluid">
    <header>
        <h1 class="text-center">Panel de administradores</h1>
    </header>

    <nav class="mt-4 navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link @if(Request::is('home')) active @endif" href="/admin/home">Home<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="/admin/listMujeres">Mujeres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/listAmbitos">Ámbitos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/UsersAdmin">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/logout">Logout</a>
                </li>
            </ul>
            <span class="navbar-text">
                Desayunos Feministas
            </span>
        </div>
    </nav>

    @yield('primary-content')    <section class="container">

    </section>

    <footer>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        function errorGenAlert() {
            $.confirm({
                title: 'Error inesperado',
                content: 'Un error ocurrio al intentar añadir',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    close: function () {
                    }
                }
            });
        }
    </script>
    @yield('custom-js')
</body>
</html>
