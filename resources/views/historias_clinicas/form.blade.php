
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

<label for="FechadeCreacion"> Fecha De Creacion </label>
<input type="date" class="form-control" name="FechadeCreacion" 
value="{{ isset( $historias_clinicas->FechadeCreacion)?$historias_clinicas->FechadeCreacion:old('FechadeCreacion')}}" id="FechadeCreacion" >
<br>
<label for="PrescripcionActual"> Prescripcion Actual </label>
<input type="text" class="form-control" name="PrescripcionActual" 
value="{{ isset( $historias_clinicas->PrescripcionActual)?$historias_clinicas->PrescripcionActual:old('PrescripcionActual')}}" id="PrescripcionActual" >
<br>
<label for="RayosX"> RayosX </label>
@if(isset($historias_clinicas->RayosX))
<img class= "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$historias_clinicas->RayosX }}" width="80" alt="">
@endif
<input type="file" class="form-control" name="RayosX" value="" id="RayosX" >
<br>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('historias_clinicas/') }}">Regresar</a>

<br>