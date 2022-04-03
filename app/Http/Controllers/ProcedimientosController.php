<?php

namespace App\Http\Controllers;

use App\Models\procedimientos;
use App\Http\Controllers\Controller;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProcedimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $datos['procedimientos']=procedimientos::paginate(5);
        // $procedimientos=DB::table('procedimientos')
        //     ->select('id', 'FechaProcedimiento','pacientes_id->Nombrepaciente','DescripcionProcedimiento', 'created_at' )
        //     ->where('pacientes_id->Nombrepaciente', 'LIKE', '%'.$texto.'%')
        //     ->paginate(2);
        $pacientes = Pacientes::all();
        return view('procedimientos.index',$datos,  compact('datos', 'pacientes', $pacientes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Pacientes::all();
        $procedimientos = new procedimientos();
        return view("procedimientos.create", compact('procedimientos', $procedimientos, 'pacientes', $pacientes));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            
            'DescripcionProcedimiento'=>'required|string|max:5000',            
        ];
        $mensaje=[
            'required'=>'Los :attribute es Requerido',
            

        ];

         $this->validate($request, $campos,$mensaje);


        //$datosprocedimientos = request()->except('_token');
        //procedimientos::insert($datosprocedimientos);

        $procedimientos = new procedimientos();

        $procedimientos-> FechaProcedimiento =$request->FechaProcedimiento;
        $procedimientos-> pacientes_id =$request-> paciente;
        $procedimientos-> DescripcionProcedimiento =$request->DescripcionProcedimiento;
        $procedimientos->saveOrFail();

        return redirect('historias_clinicas')->with('mensaje','Procedimiento creado con exito ');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\procedimientos  $procedimientos
     * @return \Illuminate\Http\Response
     */
    public function show(procedimientos $procedimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\procedimientos  $procedimientos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $procedimientos=procedimientos::findOrFail($id);
        $pacientes =Pacientes::all();
        return view('procedimientos.edit')->with('procedimientos', $procedimientos,)->with('pacientes', $pacientes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\procedimientos  $procedimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, procedimientos $procedimientos, $id)
    {
        //
        $campos=[
            'FechaProcedimiento'=>'required|date',
            'DescripcionProcedimiento'=>'required|string|max:5000',            
        ];
        $mensaje=[
            'required'=>'Los :attribute es Requerido',
            

        ];

    

        $this->validate($request, $campos,$mensaje);  


        //
        //$datosprocedimientos = request()->except(['_token','_method']);
        //procedimientos::where('id','=',$id)->update($datosprocedimientos);

        $procedimientos->FechaProcedimiento =$request->FechaProcedimiento;
        $procedimientos->pacientes_id =$request-> paciente;
        $procedimientos->DescripcionProcedimiento =$request->DescripcionProcedimiento;
        $procedimientos->update();
        $procedimientos= procedimientos::findOrFail($id);
        return redirect('historias_clinicas')->with('mensaje','Se han Modificado los datos');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\procedimientos  $procedimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $procedimientos=procedimientos::findOrFail($id);

        if(Storage::delete('public/'.$procedimientos->RadiografiaProcedimiento)){
            procedimientos::destroy($id);
        }
         return redirect('procedimientos')->with('mensaje','Se Elimino el procedimiento de la historia clinica');
    }
}
