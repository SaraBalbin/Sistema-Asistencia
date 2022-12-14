@extends('admin.homeAdmin')

@section('content')
<div class="">
    <h2 class = "title"> Administracion de Usuarios </h2>
    <a href="/register" class = "btn_new"> Crear Usuario </a>
    <div class = "tabla_registros">
        <table class = "listado">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Username</th>
                <th>Correo</th>
                <th>Rol</th>
                <th></th>
            </tr>
            @foreach ($viewData["users"] as $user)
            <tr>
                <td> {{ $user["id"] }} </td>
                <td> {{ $user["name"] }} </td>
                <td> {{ $user["username"] }} </td>
                <td> {{ $user["email"] }} </td>
                <td> {{ $user["role"] }} </td>
                <td class ='botones'>
                    <a href="{{ route('user.showEdit', ['id'=> $user['id']]) }}" class="link_edit">Editar</a>
                    <a href="{{ route('user.delete', ['id'=> $user['id']]) }}" class="link_delete">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection