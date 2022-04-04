<?php

namespace App\Http\Controllers;

use App\Models\agendamiento_de_citas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Pacientes;
use Illuminate\Support\Facades\Storage;


class AgendamientoDeCitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['agendamiento_de_citas']=agendamiento_de_citas::paginate(5);
        $doctors = Doctor::all();
        $pacientes = Pacientes::all();
        return view('agendamiento_de_citas.index',$datos, compact('doctors',$doctors,'pacientes', $pacientes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $doctors = Doctor::all();
        $pacientes = Pacientes::all();
        $agendamiento = new agendamiento_de_citas();
        return view('agendamiento_de_citas.create', compact("agendamiento",$agendamiento, 'doctors',$doctors, 'pacientes', $pacientes));
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
            //'SalaDeConsulta'=>'required|string|max:100',
            'HoraYFecha'=>'required|date|',
          //  'especialidads_id'=>'required|string|max:100',

        ];
        $mensaje=[
            'required'=>'El :attribute es Requerido',
        ];

        $this->validate($request, $campos,$mensaje);

        
        //$datosagendamiento_de_citas = request()->except('_token');
        //agendamiento_de_citas::insert($datosagendamiento_de_citas);
        $agendamiento = new agendamiento_de_citas();

        //$agendamiento->SalaDeConsulta = $request->SalaDeConsulta ;
        $agendamiento->HoraYFecha = $request->HoraYFecha ;
        $agendamiento->Hora_cita = $request->Hora_cita ;
        $agendamiento->consultorio = $request->consultorio ;
        
        //echo "Este es doctor ". $request->doctor;
        //$onj =$request->doctor;
        // echo "Este es paciente ". $request->paciente;
        // $onj =$request->paciente;
        
        $agendamiento->doctors_id = $request->doctor ;
        $agendamiento->pacientes_id = $request->paciente ;
        $agendamiento->saveOrFail();
       
       
    


        return redirect('agendamiento_de_citas')->with('mensaje','Cita creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agendamiento_de_citas  $agendamiento_de_citas
     * @return \Illuminate\Http\Response
     */
    public function show(agendamiento_de_citas $agendamiento_de_citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agendamiento_de_citas  $agendamiento_de_citas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $agendamiento = agendamiento_de_citas::findOrFail($id);
        $doctors = Doctor::all();
        $pacientes = Pacientes::all();
        return view('agendamiento_de_citas.edit')->with('agendamiento',$agendamiento) 
        ->with('doctors',$doctors)->with('pacientes',$pacientes);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agendamiento_de_citas  $agendamiento_de_citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            //'SalaDeConsulta'=>'required|string|max:100',
            'HoraYFecha'=>'required|date',
         //   'especialidads_id'=>'required|string|max:100',


        ];
        $mensaje=[
            'required'=>'Los :attribute es Requerido',

        ];

        $this->validate($request, $campos,$mensaje);


        //
        //$datosagendamiento_de_citas = request()->except(['_token','_method']);
        //agendamiento_de_citas::where('id','=',$id)->update($datosagendamiento_de_citas);
        $agendamiento=agendamiento_de_citas::findOrFail($id);
        //return view('agendamiento_de_citas.edit', compact('agendamiento_de_citas') );

        //$agendamiento->SalaDeConsulta = $request->SalaDeConsulta ;
        $agendamiento->HoraYFecha = $request->HoraYFecha ;
        $agendamiento->Hora_cita = $request->Hora_cita ;
        $agendamiento->consultorio = $request->consultorio ;
        $agendamiento->doctors_id = $request->doctor ;
        $agendamiento->pacientes_id = $request->paciente ;
        $agendamiento->update();

        return redirect('agendamiento_de_citas')->with('mensaje','Se han modificado los datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agendamiento_de_citas  $agendamiento_de_citas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $datos['agendamiento_de_citas']=agendamiento_de_citas::findOrFail($id);
        agendamiento_de_citas::destroy($id);

        return redirect('agendamiento_de_citas')->with('mensaje','Se Elimino El Agendamiento');
    }
}
