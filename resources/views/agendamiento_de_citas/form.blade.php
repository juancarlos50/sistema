
<h1>  {{ $modo }}  Agendamiento De Citas </h1>

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

<label for="SalaDeConsulta"> Consultorio </label>
<input type="text" class="form-control" name="SalaDeConsulta" 
value="{{ isset( $agendamiento_de_citas->SalaDeConsulta)?$agendamiento_de_citas->SalaDeConsulta:old('SalaDeConsulta')}}" id="SalaDeConsulta" >
<br>
</div>

<div> 

<label for="HoraYFecha"> Hora Y Fecha Cita Medica </label>
<input type="text" class="form-control" name="HoraYFecha" 
value="{{ isset( $agendamiento_de_citas->HoraYFecha)?$agendamiento_de_citas->HoraYFecha:old('HoraYFecha')}}" id="HoraYFecha" >
<br>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('agendamiento_de_citas/') }}">Regresar</a>

<br>
