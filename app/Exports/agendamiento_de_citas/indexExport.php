<?php

namespace App\Exports\agendamiento_de_citas;

use App\Models\agendamiento_de_citas\index;
use Maatwebsite\Excel\Concerns\FromCollection;

class indexExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return index::all();
    }
}
