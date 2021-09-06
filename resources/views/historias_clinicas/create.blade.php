@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/historias_clinicas') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('historias_clinicas.form',['modo'=>'Crear']);

</form>
</div>
@endsection
