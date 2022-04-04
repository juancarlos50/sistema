@extends('adminlte::page')

@section('title', 'Agendamiento de citas')

@section('content_header')
<img class="logotipo-barra" src="http://proyectomedicalbases.herokuapp.com/imagenes/isologo_para_barra.png" style="width: 200px; height: 70px;" b="" alt="logotipo">

@stop

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

</div>
@endif
<a href="{{ url('agendamiento_de_citas/create') }}"  class="btn btn-success" >Crear Cita Medica</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>Doctores</th>
            <th>Especialidad Doctor</th>
            <th>Paciente</th>
            <th>Consultorio</th>
            <th>Fecha Cita Medica</th>
            <th>Hora Cita Medica</th>
            <th>Acciones</th>

        </tr>
    </thead>

    <tbody>
        @foreach( $agendamiento_de_citas as $agendamiento_de_cita )
        <tr>
            <td>{{ $agendamiento_de_cita->id }}</td>

            <td>
                {{ $agendamiento_de_cita->doctor->Nombredoctor }}
            </td>

            <td>
                {{ $agendamiento_de_cita->doctor->Especialidad }}
            </td>

            <td>{{ $agendamiento_de_cita->pacientes->Nombrepaciente }}</td>

            <td> 
                @if ($agendamiento_de_cita->consultorio == 0)
                    201
                @else
                    202
                @endif                  
            </td> 

            <td>{{ $agendamiento_de_cita->HorayFecha }}</td>

            <td>{{ $agendamiento_de_cita->Hora_cita}}</td>

            <td>

            <a href="{{ url('/agendamiento_de_citas/'.$agendamiento_de_cita->id.'/edit') }}" class="btn btn-warning">
                    Editar
            </a>

            <form action="{{ url('/agendamiento_de_citas/'.$agendamiento_de_cita->id ) }}" class="d-inline" method="post">
            @csrf
             {{ method_field('DELETE') }}

            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro de Borrar el registro ?')"
             value="Borrar">

        </form>
        </tr>
        @endforeach

    </tbody>
</table>
 {{$agendamiento_de_citas->links()}}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop