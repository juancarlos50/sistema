@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/doctors/'.$doctors->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }}

@include('doctors.form',['modo'=>'Editar']);

</form>
</div>
@endsection

