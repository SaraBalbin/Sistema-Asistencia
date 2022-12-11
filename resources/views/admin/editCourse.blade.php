@extends('admin.homeAdmin')


@section('content')
    <div class="registerform">
        <h2 class="title"> Editar Curso </h2>
        <a href="/adminCourses" class = "btn_new"> Volver</a>
        <div class="formulario">
            <form form action="/editCourse"  method="POST">
                @csrf
                <table class ='info_element'>
                <tr>
                    <td>
                        <label for="id">ID</label>
                        <input id="id" type="text" name="id" value="{{ $viewData['course']['id'] }}" required readonly>
                    </td>
                    <td>
                        <label for="code">Código</label>
                        <input id="code" type="text" name="code" value="{{ $viewData['course']['code'] }}" required>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" value="{{ $viewData['course']['name'] }}" required>
                    </td>
                    <td>
                        <label for="methodology">Metodologia</label>
                        <select name="methodology" id="methodology">
                            <option value="Remota">Remota</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Virtual">Virtual</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Descripcion</label>
                        <textarea id="description" name="description" rows="4">{{ $viewData['course']['description'] }}</textarea>
                    </td>
                    <td>
                        <label for="classroom">Salón de clase</label>
                        <input id="classroom" type="text" name="classroom" value="{{ $viewData['course']['classroom'] }}" required>
                    </td>
            </table>  
            <button type="submit" title="edit" name="edit">Editar</button>
            
            </form>
        </div>
    </div>
@endsection