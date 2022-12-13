@extends('admin.homeAdmin')

@section('content')
<div>
    <h2 class = "title"> Profesores Disponibles</h2>
    <a href="/adminAssignment" class = "btn_new"> Volver</a>
    <div class = "tabla_registros_tipo3">
        <table class = "listado">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th WIDTH="300"></th>
            </tr>
            @foreach ($viewData["teachers"] as $teacher)
            <tr>
                <td> {{$teacher -> id}} </td>
                <td> {{$teacher -> name}} </td>
                <td> {{$teacher -> email}} </td>
                <td>
                <a href="{{ route('course.assignment', ['idTeacher' => $teacher -> id, 'idCourse' => $viewData['idCourse']]) }}" class = "btn_other"> Asignar Profesor</a>
                </td>
            </tr>
        </a>
            @endforeach
        </table>
    </div>
</div>

@endsection