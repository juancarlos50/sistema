@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/especialidads/'.$especialidads->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }}

@include('especialidads.form',['modo'=>'Editar']);

</form>
</div>
@endsection