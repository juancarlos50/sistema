
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

<label for="TipoidPaciente"> Tipo id Paciente </label>
<input type="text" class="form-control" name="TipoidPaciente" 
value="{{ isset( $paciente->TipoidPaciente)?$paciente->TipoidPaciente:old('TipoidPaciente') }}" id="TipoidPaciente" >
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
<label for="TelefonoPaciente"> Telefono Paciente </label>
<input type="text" class="form-control" name="TelefonoPaciente" 
value="{{ isset( $paciente->TelefonoPaciente)?$paciente->TelefonoPaciente:old('TelefonoPaciente')}}" id="TelefonoPaciente" >
<br>
<label for="FechaNacimiento"> Fecha de Nacimiento </label>
<input type="date" class="form-control" name="FechaNacimiento" 
value="{{ isset( $paciente->FechaNacimiento)?$paciente->FechaNacimiento:old('FechaNacimiento')}}" id="FechaNacimiento" >
<br>
<label for="EmailPaciente"> Email Paciente </label>
<input type="text" class="form-control" name="EmailPaciente" 
value="{{ isset( $paciente->EmailPaciente)?$paciente->EmailPaciente:old('EmailPaciente')}}" id="EmailPaciente" >
<br>

<label for="genero"> Genero:   </label>
<br>
<select name="genero" class="form-select form-select-sm" aria-label=".form-select-sm example">
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