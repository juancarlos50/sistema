@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/procedimientos/'.$procedimientos->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }}

@include('procedimientos.form',['modo'=>'Editar']);

</form>
</div>
@endsection
