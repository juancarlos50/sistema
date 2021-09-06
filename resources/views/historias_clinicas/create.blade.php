@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/historia_clinica') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('historias_clinicas.form',['modo'=>'Crear']);

</form>
</div>
@endsection
