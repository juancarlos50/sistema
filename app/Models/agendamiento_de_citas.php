<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agendamiento_de_citas extends Model
{
    public function Doctor(){
        return $this->hasOne("App\Models\Doctor",'id','doctors_id', );
    }
    use HasFactory;
    public function Pacientes(){
        return $this->hasOne("App\Models\Pacientes", 'id', 'pacientes_id');
    }
}
