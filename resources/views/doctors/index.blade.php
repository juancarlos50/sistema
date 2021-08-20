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





<a href="{{ url('doctors/create') }}"  class="btn btn-success" >Registro Nuevo Doctor</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>Foto</th>
            <th>Nombre Doctor</th>
            <th>Tipo id Doctor</th>
            <th>Numero id Doctor</th>
            <th>Direccion Doctor</th>
            <th>Telefono Doctor</th>
            <th>Email Doctor</th>           
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $doctors as $doctor )
        <tr>
            <td>{{ $doctor->id }}</td>

            <td>
            <img  class= "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$doctor->ImagenDoctor }}" width="80" alt="">           
            </td>


            <td>{{ $doctor->NombreDoctor }}</td>            
            <td>{{ $doctor->TipoidDoctor }}</td>
            <td>{{ $doctor->NumeroidDoctor }}</td>
            <td>{{ $doctor->DireccionDoctor }}</td>
            <td>{{ $doctor->TelefonoDoctor }}</td>
            <td>{{ $doctor->EmailDoctor }}</td>
            <td>
                
            <a href="{{ url('/doctors/'.$doctor->id.'/edit') }}" class="btn btn-warning">
                    Editar            
            </a>            
             | 

            <form action="{{ url('/doctors/'.$doctor->id ) }}" class="d-inline" method="post">
            @csrf 
             {{ method_field('DELETE') }}

            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro de Borrar el registro ?')"
             value="Borrar">

        </form>
        </tr>
        @endforeach
                
    </tbody>
</table>
 {{$doctors->links()}} 
</div>
@endsection
