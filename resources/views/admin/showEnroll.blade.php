@extends('admin.homeAdmin')

@section('content')
<div>
    <h2 class = "title"> Estudiantes Matriculados</h2>
    <a href="/adminEnroll" class = "btn_new"> Volver</a>
    <p>Estudiantes que actualmente están matriculados en el curso {{$viewData['course'] -> name}}, código {{$viewData['course'] -> code}}</p>
    <div class = "tabla_registros_tipo3">
        <table class = "listado">
            <tr>
                <th>ID Estudiante</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th WIDTH="200"></th>
            </tr>
            @foreach ($viewData["courseStudents"] as $student)
            <tr>
                <td> {{$student -> user_id}} </td>
                <td> {{$student -> user_name}} </td>
                <td> {{$student -> user_email}} </td>
                <td class ='botones'>
                <a href="{{ route('course.deleteEnroll', 
                    ['id_student_enrollments' => $student -> student_enrollments_id, 'id_course' => $viewData['course'] -> id ]) }}" class = "link_delete"> Eliminar</a>
                </td>
            </tr>
        </a>
            @endforeach
        </table>
    </div>
</div>

@endsection