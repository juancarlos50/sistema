@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/agendamiento_de_citas') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('agendamiento_de_citas.form',['modo'=>'Crear']);

</form>
</div>
@endsection
