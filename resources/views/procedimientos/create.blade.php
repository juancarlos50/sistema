@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/procedimientos') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('procedimientos.form',['modo'=>'Crear']);

</form>
</div>
@endsection