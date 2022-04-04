@extends('adminlte::page')

@section('title', 'Editar cita')

@section('content_header')
<img class="logotipo-barra" src="http://proyectomedicalbases.herokuapp.com/imagenes/isologo_para_barra.png" style="width: 200px; height: 70px;" b="" alt="logotipo">

@stop

@section('content')
<div class="container">

<form action="{{ url('/agendamiento_de_citas/'.$agendamiento->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }}

@include('agendamiento_de_citas.form',['modo'=>'Editar']);

</form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
