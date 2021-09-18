<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agendamiento_de_citas extends Model
{
    public function especialidad(){
        return $this->belongsTo(Especialidad::class);
    }
    use HasFactory;
}
