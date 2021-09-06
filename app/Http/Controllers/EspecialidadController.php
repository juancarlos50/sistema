<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['especialidads']=Especialidad::paginate(2);
        return view('especialidads.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('especialidads.create');
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
            'NombreEspecialidad'=>'required|string|max:100',
            'ValorEspecialidad'=>'required|string|max:100',
           
        ];
        $mensaje=[
            'required'=>'El :attribute es Requerido',
        ];
    
        $this->validate($request, $campos,$mensaje);

        $datosEspecialidads = request()->except('_token');
    

        Especialidad::insert($datosEspecialidads);

        return redirect('especialidads')->with('mensaje','Especialidad creada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $especialidads=Especialidad::findOrFail($id);
        return view('especialidads.edit', compact('especialidads') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $campos=[
            'NombreEspecialidad'=>'required|string|max:100',
            'ValorEspecialidad'=>'required|string|max:100',
            
         ];
    $mensaje=[
            'required'=>'El :attribute es Requerido',
        ];
        //
        $datosEspecialidads = request()->except(['_token','_method']);
    
    $this->validate($request, $campos,$mensaje);

        Especialidad::where('id','=',$id)->update($datosEspecialidads);
        $especialidads=Especialidad::findOrFail($id);

         return redirect('especialidads')->with('mensaje','Se han Modificado los datos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $especialidads=Especialidad::find($id);
        $especialidads->delete();

        return redirect('especialidads')->with('mensaje','Se Elimino la Especialidad');
    }
}
