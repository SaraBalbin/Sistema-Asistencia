@extends('teacher.homeTeacher')

@section('content')
<div>
    <h2 class = "title"> Asistencia de Clase </h2>
    <a href="/listLessonTeacher/{{$viewData['id_course']}}"class = "btn_new"> Volver</a>
    <p>Estudiantes que asistieron a la clase #{{$viewData['lesson'] -> number}}, correspondiente al tema: {{$viewData['lesson'] -> topic}}</p>
    <div class = "tabla_registros_tipo3">
        <table class = "listado">
            <tr>
                <th>ID Estudiante</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th WIDTH="200"></th>
            </tr>
            @foreach ($viewData["attendanceStudents"] as $student)
            <tr>
                <td> {{$student -> user_id}} </td>
                <td> {{$student -> user_name}} </td>
                <td> {{$student -> user_email}} </td>
                <td class ='botones'>
                <a href="{{ route('attendance.deleteAttendance', 
                    ['id_student_attendance' => $student -> attendances_id, 'id_course'=> $viewData['id_course'], 'id_lesson'=> $viewData['lesson'] -> id]) }}" class = "link_delete"> Eliminar</a>
                </td>
            </tr>
        </a>
            @endforeach
        </table>
    </div>
</div>

@endsection