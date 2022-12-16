@extends('teacher.homeTeacher')


@section('content')
    <div class="registerform">
        <h2 class="title"> Crear Clase </h2>
        <a href="/showTeacherCourses" class = "btn_new"> Volver</a>
        <div class="formulario">
            <form form action="/createLesson" method="POST">
                @csrf
                <table class ='info_element'>
                <tr>
                    <td>
                        <label for="id_course">ID del Curso</label>
                        <input id="id_course" type="number" name="id_course" value="{{ $viewData['idCourse'] }}"required readonly>
                    </td>
                    <td>
                        <label for="topic">Titulo del tema</label>
                        <input id="topic" type="text" name="topic" placeholder="Tema" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description_topic">Descripcion del tema</label>
                        <textarea id="description_topic" name="description_topic" rows="4"></textarea>
                    </td>
                    <td>
                        <label for="number">Numero de Clase</label>
                        <input id="number" type="number" name="number" placeholder="Número de clase" required>
                    </td>
                    
                </tr>
            </table>
            <button type="submit" title="Crear" name="Crear">Crear Clase</button>
            </form>
        </div>
    </div>
@endsection