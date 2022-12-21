@extends('teacher.homeTeacher')

@section('content')
<div>
    <h2 class = "title"> Clases - {{$viewData["name"]["name"]}} (ID: {{$viewData["id_course"] }}) </h2>
    <a href="/showTeacherCourses" class = "btn_new"> Volver</a>
    <div class = "tabla_registros">
        <table class = "listado listCursos">
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Tema</th>
                <th WIDTH="600">Descripcion del tema</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($viewData["lessons"] as $lesson)
            <tr>
                <td> {{$lesson -> id}} </td>
                <td> {{$lesson -> number}} </td>
                <td> {{$lesson -> topic}} </td>
                <td> {{$lesson -> description_topic}} </td>
                <td class = "botones">
                    <a class = "link_edit botones2" href="{{ route('lesson.showEditLesson', ['id_lesson'=> $lesson -> id, 'id_course'=> $viewData['id_course']]) }}" >Editar Clase</a>
                    <a class = "link_delete botones2" href="{{ route('lesson.deleteLesson', ['id_lesson'=> $lesson -> id, 'id_course'=> $viewData['id_course']]) }}" >Eliminar Clase</a>
                </td>
                <td class = "botones">
                    <a class = "link_edit botones2" href="{{ route('attendance.showStudentsCourse', ['id_lesson'=> $lesson -> id, 'id_course'=> $viewData['id_course']]) }}">Añadir Asistencia</a>
                    <a class = "link_edit botones2" href="{{ route('attendance.showAttendance', ['id_course'=> $viewData['id_course'], 'id_lesson'=> $lesson -> id]) }}" >Ver Asistencia</a>
                </td>
                
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection