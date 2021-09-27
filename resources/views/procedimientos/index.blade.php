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
            <th>Drescripcion Del Procedimiento</th> 
            <th>Radiografia</th>          
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $procedimientos as $procedimiento )
        <tr>
            <td>{{ $procedimiento->id }}</td>

            <td>{{ $procedimiento->FechaProcedimiento }}</td>            
            <td>{{ $procedimiento->DescripcionProcedimiento }}</td>

            <td>
            <img  class= "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$procedimiento->RadiografiaProcedimiento }}" width="80" alt="">           
            </td>
            <td>

            <a href="{{ url('/procedimientos/'.$procedimiento->id.'/edit') }}" class="btn btn-warning">
                    Editar            
            </a>            
             | 
               
            <form action="{{ url('/procedimientos/'.$procedimiento->id ) }}" class="d-inline" method="post">
            @csrf 
             {{ method_field('DELETE') }}

            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro de Borrar el registro ?')"
             value="Borrar">
            
        </form>
        </tr>
        @endforeach
                
    </tbody>
</table>
 {{$procedimientos->links()}} 
</div>
@endsection
