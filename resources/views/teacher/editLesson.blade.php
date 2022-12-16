@extends('teacher.homeTeacher')


@section('content')
    <div class="registerform">
        <h2 class="title"> Crear Clase </h2>
        <a href="/showCourses1" class = "btn_new"> Volver</a>
        <div class="formulario">
            <form form action="/editLesson" method="POST">
                @csrf
                <table class ='info_element'>
                <tr>
                    <td>
                        <label for="id_course">ID Curso</label>
                        <input id="id_course" type="number" name="id_course" value="{{ $viewData['id_course'] }}"required readonly>
                    </td>
                    <td>
                        <label for="id">ID Clase</label>
                        <input id="id" type="number" name="id" value="{{ $viewData['lesson']['id'] }}" required readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="number">Numero de Clase</label>
                        <input id="number" type="number" name="number" value="{{ $viewData['lesson']['number'] }}" required>
                    </td>
                    <td>
                        <label for="topic">Titulo del tema</label>
                        <input id="topic" type="text" name="topic" value="{{ $viewData['lesson']['topic'] }}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description_topic">Descripcion del tema</label>
                        <textarea id="description_topic" name="description_topic" rows="4">{{ $viewData['lesson']['description_topic'] }}</textarea>
                    </td>
                    <td>
                        <button type="submit" title="Crear" name="Crear">Editar Clase</button>
                    </td>   
                </tr>
            </table>
            </form>
        </div>
    </div>
@endsection