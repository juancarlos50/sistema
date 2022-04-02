@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container">
@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    @endif




    <a href="{{ url('pacientes/create') }}" class="btn btn-success">Registro Nuevo Paciente</a>
    <br>
    <br>
    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th>Código</th>
                <th>Nombres y apellidos</th>
                <th>Tipo de Documento</th>
                <th>Numero Documento</th>
                <th>Edad </th>
                <th>Nombre Acudiente</th>
                <th>Direccion </th>
                <th>Telefono </th>
                <th>Eps</th>
                <th>Fecha Nacimiento</th>
                <th>Email </th>
                <th>Genero </th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach( $pacientes as $paciente )
            <tr>
                <td>{{ $paciente->id }}</td>

                <td>{{ $paciente->Nombrepaciente }}</td>
                <td>
                    @if ($paciente->TipoidPaciente == 0)
                        C.C
                    @elseif ($paciente->TipoidPaciente == 1)
                        T.I
                    @else 
                        C.E
                    @endif  
                </td>
                <td>{{ $paciente->NumeroidPaciente }}</td>
                <td>{{ $paciente->EdadPaciente }}</td>
                <td>{{ $paciente->NombreAcudiente }}</td>
                <td>{{ $paciente->DireccionPaciente }}</td>
                <td>{{ $paciente->TelefonoPaciente }}</td>
                <td>
                    {{ $paciente->eps->Nombreeps }}
                </td>
                <td>{{ $paciente->FechaNacimiento }}</td>
                <td>{{ $paciente->EmailPaciente }}</td>
                <td>
                    {{$paciente->genero->NombreGenero}}
                </td>
                <td>

                    <a href="{{ url('/pacientes/'.$paciente->id.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('/pacientes/'.$paciente->id ) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}

                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro de Borrar el registro ?')" value="Borrar">
                    </form>
            </tr>
            @endforeach
        
        </tbody>
        <a class="btn btn-primary" href="{{ url('historias_clinicas/') }}">Regresar</a>
    </table>
    {{$pacientes->links()}}
</div>
@stop
@section('content')
    <p>Modulo de pacientes: bienvenidos</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop