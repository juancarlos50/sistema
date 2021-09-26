
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
value="{{ isset( $pacientes->NombrePaciente)?$pacientes->NombrePaciente:old('NombrePaciente')}}" id="NombrePaciente" >
<br>
</div>

<div> 

<label for="TipoidPaciente"> Tipo id Paciente </label>
<input type="text" class="form-control" name="TipoidPaciente" 
value="{{ isset( $pacientes->TipoidPaciente)?$pacientes->TipoidPaciente:old('TipoidPaciente') }}" id="TipoidPaciente" >
<br>
</div>

<label for="NumeroidPaciente"> Numero id Paciente </label>
<input type="text" class="form-control" name="NumeroidPaciente" 
value="{{ isset( $pacientes->NumeroidPaciente)?$pacientes->NumeroidPaciente:old('NumeroidPaciente')}}" id="NumeroidPaciente" >
<br>
<label for="EdadPaciente"> Edad </label>
<input type="text" class="form-control" name="EdadPaciente" 
value="{{ isset( $pacientes->EdadPaciente)?$pacientes->EdadPaciente:old('EdadPaciente')}}" id="EdadPaciente" >
<br>
<label for="NombreAcudiente"> Nombre del Acudiente </label>
<input type="text" class="form-control" name="NombreAcudiente" 
value="{{ isset( $pacientes->NombreAcudiente)?$pacientes->NombreAcudiente:old('NombreAcudiente')}}" id="NombreAcudiente" >
<br>
<label for="DireccionPaciente"> Direccion </label>
<input type="text" class="form-control" name="DireccionPaciente" 
value="{{ isset( $pacientes->DireccionPaciente)?$pacientes->DireccionPaciente:old('DireccionPaciente')}}" id="DireccionPaciente" >
<br>
<label for="TelefonoPaciente"> Telefono Paciente </label>
<input type="text" class="form-control" name="TelefonoPaciente" 
value="{{ isset( $pacientes->TelefonoPaciente)?$pacientes->TelefonoPaciente:old('TelefonoPaciente')}}" id="TelefonoPaciente" >
<br>
<label for="FechaNacimiento"> Fecha de Nacimiento </label>
<input type="date" class="form-control" name="FechaNacimiento" 
value="{{ isset( $pacientes->FechaNacimiento)?$pacientes->FechaNacimiento:old('FechaNacimiento')}}" id="FechaNacimiento" >
<br>
<label for="EmailPaciente"> Email Paciente </label>
<input type="text" class="form-control" name="EmailPaciente" 
value="{{ isset( $pacientes->EmailPaciente)?$pacientes->EmailPaciente:old('EmailPaciente')}}" id="EmailPaciente" >
<br>
<label for="generos_id"> Genero </label>
<select name="generos_id" id="inputGenero_id" class="form-control">
    <option value="">-- Escoja el genero --</option>
    @foreach ($generos as $genero)
        <option value="{{ $genero['id'] }}">{{ $genero['NombreGenero'] }}</option>
    @endforeach    
</select>

<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('pacientes/') }}">Regresar</a>

<br>