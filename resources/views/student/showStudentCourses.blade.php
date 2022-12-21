@extends('student.homeStudent')

@section('content')
<div>
    <h2 class = "title2"> Cursos Matriculados </h2>
    <br>
    <div class = "tabla_registros">
        <table class = "listado listCursos">
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Salón</th>
                <th WIDTH="500">Descripcion</th>
                <th WIDTH="180"></th>
            </tr>
            @foreach ($viewData["courseStudent"] as $course)
            <tr>
                <td> {{$course -> courses_id}} </td>
                <td> {{$course -> courses_code}} </td>
                <td> {{$course -> courses_name}} </td>
                <td> {{$course -> classroom}} </td>
                <td> {{$course -> description}} </td>
                <td class ='botones'>
                    <a href="{{ route('lesson.listLessonStudent', ['id_course'=> $course -> courses_id]) }}" class="link_edit">Ver Clases</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection