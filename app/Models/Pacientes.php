<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    public function genero(){
        return $this->belongsTo(Generos::class);
    }
    use HasFactory;
}
