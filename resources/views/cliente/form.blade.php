<div class="box box-info padding-1">
    <div class="box-body"> 
    @csrf 
<label for="NombrePaciente"> Nombre Paciente </label>
<input type="text" class="form-control" name="NombrePaciente" 
value="{{ isset( $pacientes->NombrePaciente)?$pacientes->NombrePaciente:old('NombrePaciente')}}" id="NombrePaciente" >
<br>
</div>  

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>