<?php

namespace App\Http\Controllers;

use App\Models\procedimientos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProcedimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['procedimientos']=procedimientos::paginate(2);
        return view('procedimientos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("procedimientos.create");
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


        $datosprocedimientos = request()->except('_token');

       
        procedimientos::insert($datosprocedimientos);
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
        return view('procedimientos.edit', compact('procedimientos') );
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

    if($request->hasFile('RadiografiaProcedimiento')){
        $campos=['RadiografiaProcedimiento'=>'required|max:10000|mimes:jpeg,png,jpg'];
        $mensaje=['RadiografiaProcedimiento.required'=>'La Imagen es Requerida'];        
    }

    $this->validate($request, $campos,$mensaje);  


        //
        $datosprocedimientos = request()->except(['_token','_method']);

        if($request->hasFile('RadiografiaProcedimiento')){
            $procedimientos=procedimientos::findOrFail($id);

            Storage::delete('public/'.$procedimientos->RadiografiaProcedimiento);

            $datosprocedimientos['RadiografiaProcedimiento']=$request->file('RadiografiaProcedimiento')->store('uploads','public');
        }
        


        procedimientos::where('id','=',$id)->update($datosprocedimientos);
        $procedimientos=procedimientos::findOrFail($id);
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
