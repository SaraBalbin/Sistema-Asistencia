
<!doctype html>
<html lang="es">
    
    <head>
        <meta charset="utf-8">
        <title> SA - Login </title>    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="{{ asset('/css/login.css') }}" rel="stylesheet" />
    </head>
    
    <body>
        <div id="contenedor">
            <div id="contenedorcentrado">
                <div id="login">
                    <form id="loginform" form action="/" method="POST">
                        @csrf
                        <label for="username">Usuario</label>
                        <input id="username" type="text" name="username" placeholder="Usuario" required>
                        
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password" required>
                        
                        <button type="submit" title="Ingresar" name="Ingresar">Iniciar Sesion</button>
                    </form>
                    
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
                        <p>Bienvenido al Sistema Academico.<br><br>Inicie sesion para continuar, si no tiene <br>una cuenta comuniquese con un administrador</p>
                    </div>
                    <!-- <p><a href='/register2' class="crear_cuenta">Crear una cuenta </a> </p> -->
                </div>
            </div>
        </div>
    </body>
</html>