
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

<div>

<label for="HoraYFecha"> Hora Y Fecha Cita Medica </label>
<input type="date" class="form-control" name="HoraYFecha"
value="{{ isset( $agendamiento_de_citas->HoraYFecha)?$agendamiento_de_citas->HoraYFecha:old('HoraYFecha')}}" id="HoraYFecha" >
<br>
</div>

<div>
<label for="Hora_cita"> Hora De La Cita Medica </label>
<input type="time" class="form-control" name="Hora_cita"
value="{{ isset( $agendamiento_de_citas->Hora_cita)?$agendamiento_de_citas->Hora_cita:old('Hora_cita')}}" id="Hora_cita" >
<br>
</div>

<div>
<label for="doctor"> Doctores </label>
<br>
<select name="doctor" class="form-control" aria-label=".form-select-sm example">
  <option selected>--Seleccione un doctor--</option>
  @foreach ($doctors as $doctor)
        <option value="{{$doctor->id}}" @if($agendamiento->doctor !=null && $agendamiento->doctor->id == $doctor->id ) selected @endif>{{ $doctor->Nombredoctor }}</option>
 @endforeach   
</select>
<br>  
</div>

<div>
<label for="paciente">  </label>
<br>
<select name="paciente" class="form-control" aria-label=".form-select-sm example">
  <option selected>--Seleccione un paciente--</option>
  @foreach ($pacientes as $paciente)
        <option value="{{$paciente->id}}" @if($agendamiento->paciente !=null && $agendamiento->paciente->id == $paciente->id ) selected @endif>{{ $paciente->Nombrepaciente }}</option>
 @endforeach   
</select>
<br>  
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('agendamiento_de_citas/') }}">Regresar</a>

<br>
