@extends('layouts.app')

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





<a href="{{ url('pacientes/create') }}"  class="btn btn-success" >Registro Nuevo Paciente</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>Nombre Paciente</th>
            <th>Tipo id paciente</th>
            <th>Numero id paciente</th>
            <th>Edad paciente</th>
            <th>Nombre Acudiente</th>
            <th>Direccion paciente</th>
            <th>Telefono paciente</th>
            <th>Fecha Nacimiento</th>
            <th>Email paciente</th>
            <th>Genero Paciente</th>           
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $pacientes as $paciente )
        <tr>
            <td>{{ $paciente->id }}</td>

            <td>
            
            </td>


            <td>{{ $paciente->NombrePaciente }}</td>            
            <td>{{ $paciente->TipoidPaciente }}</td>
            <td>{{ $paciente->NumeroidPaciente }}</td>
            <td>{{ $paciente->EdadPaciente }}</td>
            <td>{{ $paciente->NombreAcudiente }}</td>
            <td>{{ $paciente->DireccionPaciente }}</td>
            <td>{{ $paciente->TelefonoPaciente }}</td>
            <td>{{ $paciente->FechaNacimiento }}</td>
            <td>{{ $paciente->EmailPaciente }}</td>
            <td>{{ $paciente->generos_id }}</td>
            <td>
                
            <a href="{{ url('/pacientes/'.$paciente->id.'/edit') }}" class="btn btn-warning">
                    Editar            
            </a>            
             | 

            <form action="{{ url('/pacientes/'.$paciente->id ) }}" class="d-inline" method="post">
            @csrf 
             {{ method_field('DELETE') }}

            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro de Borrar el registro ?')"
             value="Borrar">

        </form>
        </tr>
        @endforeach
                
    </tbody>
</table>
 {{$pacientes->links()}} 
</div>
@endsection
