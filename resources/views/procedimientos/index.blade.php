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




<a href="{{ url('procedimientos/create') }}"  class="btn btn-success" >Crear Procedimiento</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Registro</th>
            <th>Fecha de creacion</th>
            <th>Nombre Del Paciente</th>
            <th>Drescripcion Del Procedimiento</th>          
            
        </tr>
    </thead>

    <tbody>
        @foreach( $procedimientos as $procedimiento )
        <tr>
            <td>{{ $procedimiento->id }}</td>

            <td>{{ $procedimiento->FechaProcedimiento }}</td>     
            <td> {{ $procedimiento->pacientes->Nombrepaciente}}</td>       
            <td>{{ $procedimiento->DescripcionProcedimiento }}</td>


        </tr>
        @endforeach
                
    </tbody>
</table>
<a class="btn btn-primary" href="{{ url('historias_clinicas/') }}">Regresar</a>
 {{$procedimientos->links()}} 
</div>
@endsection
