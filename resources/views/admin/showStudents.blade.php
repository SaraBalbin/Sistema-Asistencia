@extends('admin.homeAdmin')

@section('content')
<div>
    <h2 class = "title"> Estudiantes Disponibles</h2>
    <a href="/adminEnroll" class = "btn_new"> Volver</a>
    <div class = "tabla_registros_tipo3">
        <form action="/enrollment" method="post" class = "matricular">
            @csrf
            <label class = 'info_Curso' for="id">Identificador del curso seleccionado: &nbsp;&nbsp;</label>
            <input class = 'info_Curso' type="text" name="id" value="{{$viewData['idCourse']}}" readonly>
            <br>
            A continuacion aparecen los estudiantes que no están matriculados actualmente en este curso
            <br>
            @foreach ($viewData["students"] as $student)
            <input class = 'x' type="checkbox" name="studentsEnroll[]" value='{{$student -> user_id}}'>Nombre: {{$student -> name}} &nbsp;&nbsp; Correo: {{$student -> email}}</input>
            <br>
            @endforeach
            <br>
            <button type="submit" class = "btn_other" name="Matricular">Matricular</button>
        </form>
    </div>
</div>

@endsection