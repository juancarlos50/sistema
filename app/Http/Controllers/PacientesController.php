<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['pacientes']=Pacientes::paginate(2);
        return view('pacientes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pacientes.create');
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
                'NombrePaciente'=>'required|string|max:100',
                'TipoidPaciente'=>'required|string|max:100',
                'NumeroidPaciente'=>'required|string|max:100',
                'NumeroidPaciente'=>'required|string|max:100',
                'EdadPaciente'=>'required|string|max:100',
                'NombreAcudiente'=>'required|string|max:100',
                'DireccionPaciente'=>'required|string|max:100',
                'TelefonoPaciente'=>'required|string|max:100',
                'FechaNacimiento'=>'required|date', 
                'EmailPaciente'=>'required|email',
                'generos_id'=>'required|string|max:100',
        ];
        $mensaje=[
                'required'=>'El :attribute es Requerido',
            
        ];
    

        $this->validate($request, $campos,$mensaje);


        //$datosDoctors = request()->all();
        $datosPacientes = request()->except('_token');

    
        Pacientes::insert($datosPacientes);

        // return response()->json($datosDoctors);
        return redirect('pacientes')->with('mensaje','Paciente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pacientes=Pacientes::findOrFail($id);
        return view('pacientes.edit', compact('pacientes') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $campos=[
            'NombrePaciente'=>'required|string|max:100',
            'TipoidPaciente'=>'required|string|max:100',
            'NumeroidPaciente'=>'required|string|max:100',
            'NumeroidPaciente'=>'required|string|max:100',
            'EdadPaciente'=>'required|string|max:100',
            'NombreAcudiente'=>'required|string|max:100',
            'DireccionPaciente'=>'required|string|max:100',
            'TelefonoPaciente'=>'required|string|max:100',
            'FechaNacimiento'=>'required|date', 
            'EmailPaciente'=>'required|email',
            'generos_id'=>'required|string|max:100',
    ];
    $mensaje=[
            'required'=>'El :attribute es Requerido',
    
    ];  
       
    
    $this->validate($request, $campos,$mensaje);


         //
         $datosPacientes = request()->except(['_token','_method']);

         Pacientes::where('id','=',$id)->update($datosPacientes);
         $pacientes=Pacientes::findOrFail($id);
        //return view('doctors.edit', compact('doctors') );

        return redirect('pacientes')->with('mensaje','Se han Modificado los datos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pacientes=Pacientes::findOrFail($id);

        return redirect('pacientes')->with('mensaje','Se Elimino Registro de el Paciente');
    }
}
