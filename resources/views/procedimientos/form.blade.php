
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
<select name="paciente" class="form-control" aria-label=".form-select-sm example">
  <option selected>--Seleccione un paciente--</option>
  @foreach ($pacientes as $paciente)
        <option value="{{$paciente->id}}" @if($procedimientos->paciente !=null && $procedimientos->paciente->id == $paciente->id ) selected @endif>{{ $paciente->Nombrepaciente }}</option>
 @endforeach   
</select>
</div>

<div>
<label for="DescripcionProcedimiento"> Descripcion del procedimiento </label>
<input type="text" class="form-control" name="DescripcionProcedimiento" 
value="{{ isset( $procedimientos->DescripcionProcedimiento)?$procedimientos->DescripcionProcedimiento:old('DescripcionProcedimiento')}}" id="DescripcionProcedimiento" >
<br>
</div>

<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('procedimientos') }}">Regresar</a>

<br>