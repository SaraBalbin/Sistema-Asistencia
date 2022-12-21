@extends('student.homeStudent')

@section('content')
<div>
    <h2 class = "title"> Clases - {{$viewData["name"]["name"]}} (ID: {{$viewData["id_course"] }}) </h2>
    <a href="/showStudentCourses" class = "btn_new"> Volver</a>
    <div class = "tabla_registros">
        <table class = "listado listCursos">
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Tema</th>
                <th WIDTH="600">Descripcion del tema</th>
                <th>Asistencia</th>
            </tr>
            @foreach ($viewData["lessons"] as $lesson)
            <tr>
                <td> {{$lesson -> id}} </td>
                <td> {{$lesson -> number}} </td>
                <td> {{$lesson -> topic}} </td>
                <td> {{$lesson -> description_topic}} </td>
                <?php
                    if(in_array($lesson -> id, $viewData["attendance"])){
                        echo "<td class = 'asistencia'> Asistió </td>";
                    }
                    else {
                        echo "<td class = 'noAsistencia'> No Asistió </td>";
                    }
                ?>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection