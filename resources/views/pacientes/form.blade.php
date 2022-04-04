
<h1>  {{ $modo }}  Paciente </h1>

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

<label for="NombrePaciente"> Nombre Paciente </label>
<input type="text" class="form-control" name="NombrePaciente" 
value="{{ isset( $paciente->NombrePaciente)?$paciente->NombrePaciente:old('NombrePaciente')}}" id="NombrePaciente" >
<br>
</div>

<div> 
<label for="TipoidPaciente"> Tipo de Documento </label>
<select class="form-control " name="TipoidPaciente" aria-label=".form-select-sm example">
  <option selected>Seleccione Tipo de Documento</option>
  <option value="0">Cedula Ciudadania</option>
  <option value="1">Tarjeta Identidad</option>
  <option value="2">Cedula Extranjeria</option>
</select>
<br>
</div>

<label for="NumeroidPaciente"> Numero id Paciente </label>
<input type="text" class="form-control" name="NumeroidPaciente" 
value="{{ isset( $paciente->NumeroidPaciente)?$paciente->NumeroidPaciente:old('NumeroidPaciente')}}" id="NumeroidPaciente" >
<br>
<label for="EdadPaciente"> Edad </label>
<input type="text" class="form-control" name="EdadPaciente" 
value="{{ isset( $paciente->EdadPaciente)?$paciente->EdadPaciente:old('EdadPaciente')}}" id="EdadPaciente" >
<br>
<label for="NombreAcudiente"> Nombre del Acudiente </label>
<input type="text" class="form-control" name="NombreAcudiente" 
value="{{ isset( $paciente->NombreAcudiente)?$paciente->NombreAcudiente:old('NombreAcudiente')}}" id="NombreAcudiente" >
<br>
<label for="DireccionPaciente"> Direccion </label>
<input type="text" class="form-control" name="DireccionPaciente" 
value="{{ isset( $paciente->DireccionPaciente)?$paciente->DireccionPaciente:old('DireccionPaciente')}}" id="DireccionPaciente" >
<br>
<label for="TelefonoPaciente"> Telefono  </label>
<input type="text" class="form-control" name="TelefonoPaciente" 
value="{{ isset( $paciente->TelefonoPaciente)?$paciente->TelefonoPaciente:old('TelefonoPaciente')}}" id="TelefonoPaciente" >
<br>
<label for="eps"> Eps  </label>
<br>
<select name="eps" class="form-control" aria-label=".form-select-sm example">
  <option selected>--Seleccione un eps--</option>
  @foreach ($epss as $eps)
        <option value="{{$eps->id}}" @if($paciente->eps !=null && $paciente->eps->id == $eps->id ) selected @endif>{{ $eps->Nombreeps }}</option>
 @endforeach   
</select>
<br>
<label for="FechaNacimiento"> Fecha de Nacimiento </label>
<input type="date" class="form-control-little" name="FechaNacimiento" 
value="{{ isset( $paciente->FechaNacimiento)?$paciente->FechaNacimiento:old('FechaNacimiento')}}" id="FechaNacimiento" >
<br>
<br>
<label for="EmailPaciente"> Email Paciente </label>
<input type="text" class="form-control" name="EmailPaciente" 
value="{{ isset( $paciente->EmailPaciente)?$paciente->EmailPaciente:old('EmailPaciente')}}" id="EmailPaciente" >
<br>

<label for="genero"> Genero  </label>
<br>
<select name="genero" class="form-control" aria-label=".form-select-sm example">
  <option selected>--Seleccione un genero--</option>
  @foreach ($generos as $genero)
        <option value="{{$genero->id}}" @if($paciente->genero !=null && $paciente->genero->id == $genero->id ) selected @endif>{{ $genero->NombreGenero }}</option>
 @endforeach   
</select>

<br>
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('pacientes/') }}">Regresar</a>

<br>