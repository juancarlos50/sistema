<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use App\Models\Generos;

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
        $generos=Generos::all();
        return view('pacientes.index',$datos, compact('generos', $generos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $generos = Generos::all();
        $paciente = new Pacientes();
        return view('pacientes.create', compact("paciente",$paciente,'generos',$generos));
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
                
        ];
        $mensaje=[
                'required'=>'El :attribute es Requerido',

        ];


        $this->validate($request, $campos,$mensaje);


        //$datosDoctors = request()->all();
        //$datosPacientes = request()->except('_token');
        $paciente = new Pacientes();

        $paciente->NombrePaciente = $request->NombrePaciente ;
        $paciente->TipoidPaciente = $request->TipoidPaciente ;
        $paciente->NumeroidPaciente = $request->NumeroidPaciente ;
        $paciente->EdadPaciente = $request->EdadPaciente ;
        $paciente->NombreAcudiente = $request->NombreAcudiente ;
        $paciente->DireccionPaciente = $request->DireccionPaciente ;
        $paciente->TelefonoPaciente = $request->TelefonoPaciente ;
        $paciente->FechaNacimiento =$request->FechaNacimiento;
        $paciente->EmailPaciente = $request->EmailPaciente ;

        echo "Este es genero ". $request->genero;
        $onj =$request->genero;
        
        $paciente->generos_id =  $request->genero;
        $paciente->saveOrFail();
       // Pacientes::insert($datosPacientes);

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
        //return view('pacientes.edit', compact('pacientes'));
        $generos= Generos::all();
        return view('pacientes.edit')->with('paciente',$pacientes)
        ->with('generos', $generos);
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
            
    ];
    $mensaje=[
            'required'=>'El :attribute es Requerido',

    ];


    $this->validate($request, $campos,$mensaje);


    
         //
         $datosPacientes = request()->except(['_token','_method']);

       //  Pacientes::where('id','=',$id)->update($datosPacientes);
         $paciente=Pacientes::findOrFail($id);
        //return view('doctors.edit', compact('doctors') );


        $paciente->NombrePaciente = $request->NombrePaciente ;
        $paciente->TipoidPaciente = $request->TipoidPaciente ;
        $paciente->NumeroidPaciente = $request->NumeroidPaciente ;
        $paciente->EdadPaciente = $request->EdadPaciente ;
        $paciente->NombreAcudiente = $request->NombreAcudiente ;
        $paciente->DireccionPaciente = $request->DireccionPaciente ;
        $paciente->TelefonoPaciente = $request->TelefonoPaciente ;
        $paciente->FechaNacimiento =$request->FechaNacimiento;
        $paciente->EmailPaciente = $request->EmailPaciente ;

        echo "Este es genero ". $request->genero;
        $onj =$request->genero;
        
        $paciente->generos_id =  $request->genero;

        $paciente->update();


       return redirect('pacientes')->with('mensaje','Se han modificado los datos');

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
        $pacientes->delete();

        return redirect('pacientes')->with('mensaje','Se Elimino Registro de el Paciente');
    }
}
