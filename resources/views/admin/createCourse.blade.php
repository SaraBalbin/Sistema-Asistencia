@extends('admin.homeAdmin')


@section('content')
    <div class="registerform">
        <h2 class="title"> Crear Curso </h2>
        <a href="/adminCourses" class = "btn_new"> Volver</a>
        <div class="formulario">
            <form form action="/registerCourse" method="POST">
                @csrf
                <table class ='info_element'>
                <tr>
                    <td>
                        <label for="code">Código</label>
                        <input id="code" type="text" name="code" placeholder="Codigo" required>
                    </td>
                    <td>
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" placeholder="Nombre" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="methodology">Metodologia</label>
                        <select name="methodology" id="methodology">
                            <option value="Remota">Remota</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Virtual">Virtual</option>
                        </select>
                    </td>
                    <td>
                        <label for="classroom">Salón de clase</label>
                        <input id="classroom" type="text" name="classroom" placeholder="Salón" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="classroom">Descripcion</label>
                        <textarea id="description" name="description" rows="4"></textarea>
                    </td>
                    <td class ='botonMitad'>
                        <button type="submit" title="Ingresar" name="Registrar">Crear</button>
                    </td>
                </tr>
                </table>
            </form>
        </div>
    </div>
@endsection