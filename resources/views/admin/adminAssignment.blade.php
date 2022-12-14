@extends('admin.homeAdmin')

@section('content')
<div>
    <h2 class = "title2"> Asignación de profesores </h2>
    <br>
    <li>Por busqueda </li>
    <div class="formulario">
        <form form action="/AssignmentSearch" method="POST">
                @csrf
                <table class ='info_element'>
                <tr>
                    <td>
                        <label for="id_course">Identificacion del curso</label>
                        <input id="id_course" type="number" name="id_course" placeholder="Curso" required>
                    </td>
                    <td>
                        <label for="id_teacher">Identificacion del profesor</label>
                        <input id="id_teacher" type="number" name="id_teacher" placeholder="Profesor" required>
                    </td>
                    <td>
                        <button type="submit" title="Ingresar" name="Asignar">Asignar</button>
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
                <th>ID Curso</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Profesor Asignado</th>
                <th></th>
            </tr>
            @foreach ($viewData["courseTeacher"] as $element)
            <tr>
                <td> {{ $element -> courses_id }} </td>
                <td> {{ $element -> courses_code }} </td>
                <td> {{ $element -> courses_name }} </td>
                <td> {{ $element -> teacher_name }} </td>
                <td> 
                    <a href="{{ route('course.showTeachers', ['id' => $element -> courses_id]) }}" class="link_edit">Asignar Profesor</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection