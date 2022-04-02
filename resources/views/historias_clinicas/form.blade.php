
<h1>  {{ $modo }}  Historias Clinicas </h1>

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
<label for="AntecedentesMedicos"> Antecedentes Medicos </label>
<input type="text" class="form-control" name="AntecedentesMedicos" 
value="{{ isset( $historias_clinicas->AntecedentesMedicos)?$historias_clinicas->AntecedentesMedicos:old('AntecedentesMedicos')}}" id="AntecedentesMedicos" >
<br>
</div>
<div>
<select name="paciente" class="form-control" aria-label=".form-select-sm example">
  <option selected>--Seleccione un paciente--</option>
  @foreach ($pacientes as $paciente)
        <option value="{{$paciente->id}}" @if($historias->paciente !=null && $historias->paciente->id == $paciente->id ) selected @endif>{{ $paciente->Nombrepaciente }}</option>
 @endforeach   
</select>
</div>

<label for="DatosDeCreacion"> Fecha De Creacion </label>
<input type="date" class="form-control" name="DatosDeCreacion" 
value="{{ isset( $historias_clinicas->DatosDeCreacion)?$historias_clinicas->DatosDeCreacion:old('DatosDeCreacion')}}" id="DatosDeCreacion" >
<br>
<label for="PrescripcionActual"> Prescripcion Actual </label>
<input type="text" class="form-control" name="PrescripcionActual" 
value="{{ isset( $historias_clinicas->PrescripcionActual)?$historias_clinicas->PrescripcionActual:old('PrescripcionActual')}}" id="PrescripcionActual" >
<br>
<label for="RayosX"> Rayos X </label>
@if(isset($historias_clinicas->RayosX))
<img class= "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$historias_clinicas->RayosX }}" width="80" alt="">
@endif
<input type="file" class="form-control" name="RayosX" value="" id="RayosX" >
<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('historias_clinicas/') }}">Regresar</a>

<br>
