@extends('teacher.homeTeacher')

@section('content')
<div>
    <h2 class = "title"> Clases - {{$viewData["name"]["name"]}} </h2>
    <a href="/showCourses1" class = "btn_new"> Volver</a>
    <div class = "tabla_registros">
        <table class = "listado listCursos">
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Tema</th>
                <th WIDTH="600">Descripcion del tema</th>
                <th WIDTH="280"></th>
            </tr>
            @foreach ($viewData["lessons"] as $lesson)
            <tr>
                <td> {{$lesson -> id}} </td>
                <td> {{$lesson -> number}} </td>
                <td> {{$lesson -> topic}} </td>
                <td> {{$lesson -> description_topic}} </td>
                <td class = "botones">
                    <a href="{{ route('lesson.showEditLesson', ['id_lesson'=> $lesson -> id, 'id_course'=> $viewData['id_course']]) }}" class="link_edit">Editar</a>
                    <a href="{{ route('lesson.deleteLesson', ['id_lesson'=> $lesson -> id, 'id_course'=> $viewData['id_course']]) }}" class="link_delete">Eliminar</a>
                </td>
                
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection