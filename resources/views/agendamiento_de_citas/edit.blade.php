@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/agendamiento_de_citas/'.$agendamiento_de_citas->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }}

@include('agendamiento_de_citas.form',['modo'=>'Editar']);

</form>
</div>
@endsection
