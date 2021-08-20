<h1>  {{ $modo }}  Especialidad </h1>

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

<label for="NombreEspecialidad"> Nombre Especialidad </label>
<input type="text" class="form-control" name="NombreEspecialidad" 
value="{{ isset( $especialidads->NombreEspecialidad)?$especialidads->NombreEspecialidad:old('NombreEspecialidad')}}" id="NombreEspecialidad" >
<br>
</div>

<div> 

<label for="ValorEspecialidad"> Valor de la Especialidad </label>
<input type="text" class="form-control" name="ValorEspecialidad" 
value="{{ isset( $especialidads->ValorEspecialidad)?$especialidads->ValorEspecialidad:old('ValorEspecialidad') }}" id="ValorEspecialidad" >
<br>
</div>

<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('especialidads/') }}">Regresar</a>

<br>