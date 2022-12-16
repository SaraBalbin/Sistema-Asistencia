@extends('teacher.homeTeacher')

@section('content')
<div>
    <h2 class = "title2"> Cursos Asignados </h2>
    <br>
    <div class = "tabla_registros">
        <table class = "listado listCursos">
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Salón</th>
                <th WIDTH="500">Descripcion</th>
                <th WIDTH="280"></th>
            </tr>
            @foreach ($viewData["courseTeacher"] as $course)
            <tr>
                <td> {{$course -> courses_id}} </td>
                <td> {{$course -> courses_code}} </td>
                <td> {{$course -> courses_name}} </td>
                <td> {{$course -> classroom}} </td>
                <td> {{$course -> description}} </td>
                <td class ='botones'>
                    <a href="{{ route('lesson.showCreate', ['id_course'=> $course -> courses_id]) }}" class="link_edit">Crear Clase</a>
                    <a href="{{ route('lesson.listLesson', ['id_course'=> $course -> courses_id]) }}" class="link_edit">Ver Clases</a>
                </td>
                
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection