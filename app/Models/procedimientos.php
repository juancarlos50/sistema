<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procedimientos extends Model
{
    use HasFactory;
    public function Pacientes(){
        return $this->hasOne("App\Models\Pacientes", 'id', 'pacientes_id');
    }
    public function Doctor(){
        return $this->hasOne("App\Models\Doctor",'id','doctors_id', );
    }
}
