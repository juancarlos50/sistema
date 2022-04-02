
<h1>  {{ $modo }}  Doctor </h1>

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

<label for="NombreDoctor"> Nombre Doctor </label>
<input type="text" class="form-control" name="NombreDoctor" 
value="{{ isset( $doctors->NombreDoctor)?$doctors->NombreDoctor:old('NombreDoctor')}}" id="NombreDoctor" >
<br>
</div>

<div> 

<label for="TipoidDoctor"> Tipo de Documento </label>
<select class="form-control " name="TipoidDoctor" aria-label=".form-select-sm example">
  <option selected>Seleccione Tipo de Documento</option>
  <option value="0">Cedula Ciudadania</option>
  <option value="1">Tarjeta Identidad</option>
  <option value="2">Cedula Extranjeria</option>
</select>
</div>
<br>
<label for="NumeroidDoctor"> Numero id Doctor </label>
<input type="text" class="form-control" name="NumeroidDoctor" 
value="{{ isset( $doctors->NumeroidDoctor)?$doctors->NumeroidDoctor:old('NumeroidDoctor')}}" id="NumeroidDoctor" >
<br>
<label for="DireccionDoctor"> Direccion Doctor </label>
<input type="text" class="form-control" name="DireccionDoctor" 
value="{{ isset( $doctors->DireccionDoctor)?$doctors->DireccionDoctor:old('DireccionDoctor')}}" id="DireccionDoctor" >
<br>
<label for="TelefonoDoctor"> Telefono Doctor </label>
<input type="text" class="form-control" name="TelefonoDoctor" 
value="{{ isset( $doctors->TelefonoDoctor)?$doctors->TelefonoDoctor:old('TelefonoDoctor')}}" id="TelefonoDoctor" >
<br>
<label for="EmailDoctor"> Email Doctor </label>
<input type="text" class="form-control" name="EmailDoctor" 
value="{{ isset( $doctors->EmailDoctor)?$doctors->EmailDoctor:old('EmailDoctor')}}" id="EmailDoctor" >
<br>
<label for="ImagenDoctor"> Foto </label>
@if(isset($doctors->ImagenDoctor))
<img class= "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$doctors->ImagenDoctor }}" width="80" alt="">
@endif
<input type="file" class="form-control" name="ImagenDoctor" value="" id="ImagenDoctor" >
<br>
<label for="Especialidad"> Especialidad </label>
<input type="text" class="form-control" name="Especialidad" 
value="{{ isset( $doctors->Especialidad)?$doctors->Especialidad:old('Especialidad')}}" id="Especialidad" >
<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('doctors/') }}">Regresar</a>

<br>