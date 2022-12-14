@extends('admin.homeAdmin')

@section('content')
<div>
    <h2 class = "title"> Administracion de Cursos </h2>
    <a href="/registerCourse" class = "btn_new"> Crear Curso </a>
    <div class = "tabla_registros">
        <table class = "listado listCursos">
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Metodologia</th>
                <th>Salón</th>
                <th WIDTH="500">Descripcion</th>
                <th></th>
            </tr>
            @foreach ($viewData["courses"] as $course)
            <tr>
                <td> {{ $course["id"] }} </td>
                <td> {{ $course["code"] }} </td>
                <td> {{ $course["name"] }} </td>
                <td> {{ $course["methodology"] }} </td>
                <td> {{ $course["classroom"] }} </td>
                <td> {{ $course["description"] }} </td>
                <td class ='botones'>
                    <a href="{{ route('course.showEditCourse', ['id'=> $course['id']]) }}" class="link_edit">Editar</a>
                    <a href="{{ route('course.deleteCourse', ['id'=> $course['id']]) }}" class="link_delete">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection