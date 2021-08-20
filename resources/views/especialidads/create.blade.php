@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/especialidads') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('especialidads.form',['modo'=>'Crear']);

</form>
</div>
@endsection