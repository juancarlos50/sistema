@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/eps/'.$eps->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }}

@include('eps.form',['modo'=>'Editar']);

</form>
</div>
@endsection
