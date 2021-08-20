
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

<label for="TipoidDoctor"> Tipo id Doctor </label>
<input type="text" class="form-control" name="TipoidDoctor" 
value="{{ isset( $doctors->TipoidDoctor)?$doctors->TipoidDoctor:old('TipoidDoctor') }}" id="TipoidDoctor" >
<br>
</div>

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

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('doctors/') }}">Regresar</a>

<br>