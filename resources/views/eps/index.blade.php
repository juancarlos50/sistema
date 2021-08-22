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





<a href="{{ url('eps/create') }}"  class="btn btn-success" >Registro Nueva EPS</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>Nombre EPS</th>
            <th>Tipo de Afiliacion</th>                 
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $eps as $eps1 )
        <tr>
            <td>{{ $eps1->id }}</td>

            

            <td>{{ $eps1->NombreEps }}</td>            
            <td>{{ $eps1->TipoAfiliado }}</td>
            
            <td>
                
            <a href="{{ url('/eps/'.$eps1->id.'/edit') }}" class="btn btn-warning">
                    Editar            
            </a>            
             | 

            <form action="{{ url('/eps/'.$eps1->id ) }}" class="d-inline" method="post">
            @csrf 
             {{ method_field('DELETE') }}

            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro de Borrar el registro ?')"
             value="Borrar">

        </form>
        </tr>
        @endforeach
                
    </tbody>
</table>
 {{$eps->links()}} 
</div>
@endsection
