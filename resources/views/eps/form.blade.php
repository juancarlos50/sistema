
<h1>  {{ $modo }}  EPS </h1>

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

<label for="NombreEps"> Nombre EPS </label>
<input type="text" class="form-control" name="NombreEps" 
value="{{ isset( $eps->NombreEps)?$eps->NombreEps:old('NombreEps')}}" id="NombreEps" >
<br>
</div>

<div> 

<label for="TipoAfiliado"> Tipo Afiliacion </label>
<input type="text" class="form-control" name="TipoAfiliado" 
value="{{ isset( $eps->TipoAfiliado)?$eps->TipoAfiliado:old('TipoAfiliado')}}" id="TipoAfiliado" >
<br>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('eps/') }}">Regresar</a>

<br>