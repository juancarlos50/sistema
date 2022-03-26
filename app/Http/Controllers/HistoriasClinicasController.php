<?php

namespace App\Http\Controllers;

use App\Models\historias_clinicas;
use App\models\procedimientos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HistoriasClinicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['historias_clinicas']=historias_clinicas::paginate(2);
        return view('historias_clinicas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('historias_clinicas.create');
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
            'AntecedentesMedicos'=>'required|string|max:100',
            'DatosDeCreacion'=>'required|date',
            'PrescripcionActual'=>'required|string|max:100',            
            //'RayosX'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'Los :attribute es Requerido',
            //'RayosX.required'=>'La Imagen es Requerida'

        ];

         $this->validate($request, $campos,$mensaje);

        $datoshistorias_clinicas = request()->except('_token');

        historias_clinicas::insert($datoshistorias_clinicas);

        return redirect('historias_clinicas')->with('mensaje','Historia Clinica agregada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historias_clinicas  $historias_clinicas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datovista = historias_clinicas::find($id);
        return view('historias_clinicas.show' , compact('datovista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historias_clinicas  $historias_clinicas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $historias_clinicas=historias_clinicas::findOrFail($id);
        return view('historias_clinicas.edit', compact('historias_clinicas') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historias_clinicas  $historias_clinicas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $campos=[
            'AntecedentesMedicos'=>'required|string|max:100',
            'DatosDeCreacion'=>'required|date',
            'PrescripcionActual'=>'required|string|max:100',            
            
    ];
        $mensaje=[
            'required'=>'Los :attribute es Requerido',
            

    ];

    if($request->hasFile('RayosX')){
        $campos=['RayosX'=>'required|max:10000|mimes:jpeg,png,jpg'];
        $mensaje=['RayosX.required'=>'La Imagen es Requerida'];        
    }

    $this->validate($request, $campos,$mensaje);  


        //
        $datoshistorias_clinicas = request()->except(['_token','_method']);

        if($request->hasFile('RayosX')){
            $historias_clinicas=historias_clinicas::findOrFail($id);

            Storage::delete('public/uploads'.$historias_clinicas->RayosX);

            $datoshistorias_clinicas['RayosX']=$request->file('RayosX')->store('uploads','public');
        }
        


        historias_clinicas::where('id','=',$id)->update($datoshistorias_clinicas);
        $historias_clinicas=historias_clinicas::findOrFail($id);
        //return view('historias_clinicas.edit', compact('historias_clinicas') );

        return redirect('historias_clinicas')->with('mensaje','Se han Modificado los datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historias_clinicas  $historias_clinicas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $historias_clinicas=historias_clinicas::findOrFail($id);

        if(Storage::delete('public/'.$historias_clinicas->RayosX)){
            historias_clinicas::destroy($id);
        }

       

        return redirect('historias_clinicas')->with('mensaje','Se Elimino Registro de la Historia');
    }
    
}
