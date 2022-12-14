@extends('admin.homeAdmin')

@section('content')
<div>
    <h2 class = "title2"> Matricula de Estudiantes </h2>
    <br>
    <li>Por busqueda individual </li>
    <div class="formulario">
        <form form action="/enrollmentSearch" method="POST">
                @csrf
                <table class ='info_element'>
                <tr>
                    <td>
                        <label for="id_course">Identificacion del curso</label>
                        <input id="id_course" type="number" name="id_course" placeholder="Curso" required>
                    </td>
                    <td>
                        <label for="id_student">Identificacion del estudiante</label>
                        <input id="id_student" type="number" name="id_student" placeholder="Estudiante" required>
                    </td>
                    <td>
                        <button type="submit" title="Ingresar" name="Matricular">Matricular</button>
                    </td>
                </tr>
            </table>
    </form>
</div>
<br>
<li>Por listado y seleccion </li>
    <div class = "tabla_registros_tipo2 ">
        <table class = "listado">
        <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th WIDTH="300"></th>
            </tr>
            @foreach ($viewData["courses"] as $course)
            <tr>
                <td> {{ $course["id"] }} </td>
                <td> {{ $course["code"] }} </td>
                <td> {{ $course["name"] }} </td>
                <td> 
                    <a href="{{ route('course.showStudents', ['id'=> $course['id']]) }}" class="link_edit">Matricular</a>
                    <a href="{{ route('course.showEnroll', ['id_course'=> $course['id']]) }}" class="link_edit">Ver Lista</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection