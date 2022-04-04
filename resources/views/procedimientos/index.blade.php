@extends('adminlte::page')

@section('title', 'Procedimientos medicos')

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


<div class="row">
<div class="col-sm">
    <form action="{{ url('procedimientos/search') }}" method="post">
        @csrf
        <div>
            <label for="texto"> Buscardor</label>
            <input type="text" name="texto" id="texto">
            <input type="submit" value="Buscar">
        </div>
    </form>
</div>

</div>

<a href="{{ url('procedimientos/create') }}"  class="btn btn-success my-3" >Crear Procedimiento</a>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Registro</th>
            <th>Fecha de creacion</th>
            <th>Nombre Del Paciente</th>
            <th>Doctor Encargado</th>
            <th>Drescripcion Del Procedimiento</th>          
            
        </tr>
    </thead>

    <tbody>
        @foreach( $procedimientos as $procedimiento )
        <tr>
            <td>{{ $procedimiento->id }}</td>
            <td>{{ $procedimiento->FechaProcedimiento }}</td>     
            <td>{{ $procedimiento->pacientes->Nombrepaciente}}</td> 
            <td>{{ $procedimiento->doctor_Nombredoctor}}</td> 
            <td>{{ $procedimiento->DescripcionProcedimiento }}</td>


        </tr>
        @endforeach
                
    </tbody>
</table>
<br>
 {{$procedimientos->links()}} 
 <a class="btn btn-primary" href="{{ url('historias_clinicas/') }}">Regresar</a>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop