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




<a href="{{ url('historias_clinicas/create') }}"  class="btn btn-success" >Crear Historia Clinica</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>RayosX</th>
            <th>Antecedentes Medicos</th>
            <th>Fecha De Creacion</th>
            <th>Prescripcion Actual</th> 
            <th>Procedimientos</th>          
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $historias_clinicas as $historia_clinica )
        <tr>
            <td>{{ $historia_clinica->id }}</td>

            <td>
            <img  class= "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$historia_clinica->RayosX }}" width="80" alt="">           
            </td>


            <td>{{ $historia_clinica->AntecedentesMedicos }}</td>            
            <td>{{ $historia_clinica->DatosDeCreacion }}</td>
            <td>{{ $historia_clinica->PrescripcionActual }}</td>

            <td>    
            <a href="{{ url('procedimientos') }}"  class="btn btn-info">
                    ver
            </a>
            </td>
            <td>
             
            <a href="{{ url('/historias_clinicas/'.$historia_clinica->id.'/edit') }}" class="btn btn-warning">
                    editar
            </a>            
             |
            <form action="{{ url('/historias_clinicas/'.$historia_clinica->id ) }}" class="d-inline" method="post">
            @csrf 
             {{ method_field('DELETE') }}

            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro de Borrar el registro ?')"
             value="Borrar">

            </form>
        </tr>
        @endforeach
                
    </tbody>
</table>
 {{$historias_clinicas->links()}} 
</div>
@endsection
