<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Home</h1>

    @auth
        <p class="lead">Bienvenido ESTUDIANTE {{auth() -> user() -> username}}</p>
        <p><a href='/logout'>Cerrar Sesion </a> </p>
    @endauth

    @guest
        <p class="lead">Para ver el contenido inicie Sesion</p>
        <p><a href='/login'>Iniciar Sesion </a> </p>
    @endguest

</body>
</html>