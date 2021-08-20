@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/eps') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('eps.form',['modo'=>'Crear']);

</form>
</div>
@endsection