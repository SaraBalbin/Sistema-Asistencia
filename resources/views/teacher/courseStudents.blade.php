@extends('teacher.homeTeacher')

@section('content')
<div>
    <h2 class = "title"> Estudiantes Sin Asistencia</h2>
    <a href="/listLesson/{{$viewData['idCourse']}}" class = "btn_new"> Volver</a>
    <div class = "tabla_registros_tipo3">
        <form action="/registerAttendance" method="post" class = "matricular">
            @csrf
            <table class ='info_element'>
                <tr>
                    <td>
                        <label for="idCourse">Identificador del curso seleccionado: &nbsp;&nbsp;</label>
                        <input class = 'input_asist' type="text" name="idCourse" value="{{$viewData['idCourse']}}" readonly>
                    </td>
                    <td>
                        <label for="idLesson">Identificador de la clase seleccionada: &nbsp;&nbsp;</label>
                        <input class = 'input_asist' type="text" name="idLesson" value="{{$viewData['idLesson']}}" readonly>
                    </td>
                </tr>
            </table>
            A continuacion aparecen los estudiantes que no están registrados en la asistencia
            <br>
            @foreach ($viewData["students"] as $student)
            <input class = 'x' type="checkbox" name="studentsAttendance[]" value='{{$student -> user_id}}'>Nombre: {{$student -> user_name}} &nbsp;&nbsp; Correo: {{$student -> user_email}}</input>
            <br>
            @endforeach
            <br>
            <button type="submit" class = "btn_other" name="Registrar">Registrar en asistencia</button>
        </form>
    </div>
</div>

@endsection