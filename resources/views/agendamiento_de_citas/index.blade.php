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
<a href="{{ url('agendamiento_de_citas/create') }}"  class="btn btn-success" >Crear Cita Medica</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>Consultorio</th>
            <th>Hora Y Fecha Cita Medica</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $agendamiento_de_citas as $agendamiento_de_cita )
        <tr>
            <td>{{ $agendamiento_de_cita->id }}</td>



            <td>{{ $agendamiento_de_cita->SalaDeConsulta }}</td>
            <td>{{ $agendamiento_de_cita->HoraYFecha }}</td>

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
@endsection
