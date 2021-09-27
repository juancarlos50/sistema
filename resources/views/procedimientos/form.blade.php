
<h1>  {{ $modo }}  Procedimientos Medicos </h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
<ul>

     @foreach( $errors->all() as $error)
     <li>   {{ $error}} </li>
    @endforeach
</ul>

</div>

   

@endif
<div>

<label for="FechaProcedimiento"> Fecha Del procedimiento </label>
<input type="date" class="form-control" name="FechaProcedimiento" 
value="{{ isset( $procedimientos->FechaProcedimiento)?$procedimientos->FechaProcedimiento:old('FechaProcedimiento')}}" id="FechaProcedimiento" >
<br>
</div>

<div>

<label for="DescripcionProcedimiento"> Descripcion del procedimiento </label>
<input type="text" class="form-control" name="DescripcionProcedimiento" 
value="{{ isset( $procedimientos->DescripcionProcedimiento)?$procedimientos->DescripcionProcedimiento:old('DescripcionProcedimiento')}}" id="DescripcionProcedimiento" >
<br>
</div>

<label for="RadiografiaProcedimiento"> imagen </label>
@if(isset($procedimientos->RadiografiaProcedimiento))
<img class= "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$procedimientos->RadiografiaProcedimiento }}" width="80" alt="">
@endif
<input type="file" class="form-control" name="RadiografiaProcedimiento" value="" id="RadiografiaProcedimiento" >
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('doctors/') }}">Regresar</a>

<br>