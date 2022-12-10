@extends('admin.homeAdmin')


@section('content')
    <div class="registerform">
        <h2 class="title"> Crear Usuario </h2>
        <a href="/adminUsers" class = "btn_new"> Volver</a>
        <div class="formulario">
            <form form action="/register" method="POST">
                @csrf
                <table class ='info_user'>
                <tr>
                    <td>
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" placeholder="Nombre" required>
                    </td>
                    <td>
                        <label for="username">Usuario</label>
                        <input id="username" type="text" name="username" placeholder="Usuario" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Correo</label>
                        <input id="email" type="email" name="email" placeholder="Correo electronico" required>
                    </td>
                    <td>
                        <label for="role">Tipo de usuario</label>
                        <select name="role" id="role">
                            <option value="Administrador">Administrador</option>
                            <option value="Profesor">Profesor</option>
                            <option value="Estudiante">Estudiante</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password" required>
                    </td>
                    <td>
                        <label for="password">Confirme contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password_confirmation" required>
                    </td>
                </tr>
            </table>
                <button type="submit" title="Ingresar" name="Registrar">Crear</button>
            </form>
        </div>
    </div>
@endsection