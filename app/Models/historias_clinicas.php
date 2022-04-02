<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historias_clinicas extends Model
{
    public function Pacientes(){
        return $this->hasOne("App\Models\Pacientes", 'id', 'pacientes_id');
    }
}