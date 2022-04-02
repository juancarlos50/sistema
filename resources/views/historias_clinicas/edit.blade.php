@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/historias_clinicas/'.$historias->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }}

@include('historias_clinicas.form',['modo'=>'Editar']);

</form>
</div>
@endsection
