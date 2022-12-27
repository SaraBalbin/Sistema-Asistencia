<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet" />
    <title>Inicio</title>
</head>
<body class = 'pagina'>
    <div class="container-fluid pagina">
        <div class = 'row pagina'>
            <nav class="col-2 main-menu">
                <ul>
                    <li>
                        <a href="/homeStudent">
                            <i class="fa fa-home fa-2x"></i>
                            <span class="nav-text"> Página Principal </span>
                        </a>
                    </li>
                    <li class="has-subnav">
                        <a href="/showStudentCourses">
                            <i class="fa fa-list fa-2x"></i>
                            <span class="nav-text">Cursos Matriculados</span>
                        </a>
                            
                    </li>
                    <li>
                        <a href="/infoStudent">
                            <i class="fa fa-info fa-2x"></i>
                            <span class="nav-text">Información</span>
                        </a>
                    </li>
                </ul>

                <ul class="logout">
                    <li>
                        <a href='/logout'>
                            <i class="fa fa-power-off fa-2x"></i>
                            <span class="nav-text">Logout </span>
                        </a>
                    </li>  
                </ul>
            </nav>

            <main class="col-10 contenido">
                <div class ='barraSuperior'>
                    <table class = 'menu_super'>
                        <td>
                            <p class = 'mensaje_bienv'>Bienvenido, {{auth() -> user() -> name}} </p>
                        </td>
                        <td class="left">
                            <img src="{{ asset('/img/perfil.png')}}"> <br>
                            <p>Estudiante</p>
                        </td>
                    </table>
                </div>
                <div class ='content'>
                    @yield('title')
                    @yield('content')
                </div>
            </main>
        </div>

    </div>

    </body>
</html>
