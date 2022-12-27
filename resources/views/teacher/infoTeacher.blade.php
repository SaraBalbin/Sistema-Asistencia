@extends('teacher.homeTeacher')

@section('content')
<table class = 'info_User'>
    <tr>
        <td class = 'columna1'> Nombre </td>
        <td class = 'columna2'> {{ $viewData["user"]["name"] }} </td>
    </tr>
    <tr>
        <td class = 'columna1'> Usuario </td>
        <td class = 'columna2'> {{ $viewData["user"]["username"] }} </td>
    </tr>
    <tr>
        <td class = 'columna1'> Correo </td>
        <td class = 'columna2'> {{ $viewData["user"]["email"] }} </td>
    </tr>
    <tr>
        <td class = 'columna1'> Rol </td>
        <td class = 'columna2'> {{ $viewData["user"]["role"] }} </td>
    </tr>
</table>

<br>
    <div id="footer">&nbsp; &nbsp; Realizado por: Sara Catalina Balbin Ramirez </div>
@endsection