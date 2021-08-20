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





<a href="{{ url('especialidads/create') }}"  class="btn btn-success" >Registro Nueva Especialidad</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>Nombre Especialidad</th>
            <th>Valor Especialidad</th>                
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $especialidads as $especialidad )
        <tr>
            <td>{{ $especialidad->idEspecialidad }}</td>

            
            <td>{{ $especialidad->NombreEspecialidad }}</td>            
            <td>{{ $especialidad->ValorEspecialidad }}</td>
            
            <td>
                
            <a href="{{ url('/especialidads/'.$especialidad->IdEspecialidad.'/edit') }}" class="btn btn-warning">
                    Editar            
            </a>            
             | 

            <form action="{{ url('/especialidads/'.$especialidad->IdEspecialidad ) }}" class="d-inline" method="post">
            @csrf 
             {{ method_field('DELETE') }}

            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro de Borrar el registro ?')"
             value="Borrar">

        </form>
        </tr>
        @endforeach
                
    </tbody>
</table>
 {{$especialidads->links()}} 
</div>
@endsection