@extends('admin.homeAdmin')


@section('content')
    <div class="registerform">
        <h2 class="title"> Editar Usuario </h2>
        <a href="/adminUsers" class = "btn_new"> Volver</a>
        <div class="formulario">
            <form form action="/edit"  method="POST">
                @csrf
                <table class ='info_user'>
                <tr>
                    <td>
                        <label for="id">ID</label>
                        <input id="id" type="text" name="id" value="{{ $viewData['user']['id'] }}" required readonly>
                    </td>
                    <td>
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" value="{{ $viewData['user']['name'] }}" required>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="username">Correo</label>
                        <input id="email" type="email" name="email" value="{{ $viewData['user']['email'] }}"  required>
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
                        <label for="username">Usuario</label>
                        <input id="username" type="text" name="username" value="{{ $viewData['user']['username'] }}"  required>
                    </td>
                    <td>
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" value=""  name="password" required>
                    </td>
                <tr>
                    <td>
                        <label for="password">Confirme contraseña</label>
                        <input id="password" type="password" value="" name="password_confirmation" required>
                    </td>
                    <td>
                        <button type="submit" title="edit" name="edit">Editar</button>
                    </td>
                </tr>
            </table>
                
            </form>
        </div>
    </div>
@endsection