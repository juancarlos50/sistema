<?php

namespace App\Http\Controllers;

use App\Models\Eps;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['eps']=Eps::paginate(2);
        return view('eps.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('eps.create');
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
                'NombreEps'=>'required|string|max:100',
                'TipoAfiliado'=>'required|string|max:100',
        ];
        $mensaje=[
                'required'=>'El :attribute es Requerido',

        ];

        $this->validate($request, $campos,$mensaje);

        //$datosDoctors = request()->all();
        $datosEps = request()->except('_token');

        Eps::insert($datosEps);

        // return response()->json($datosDoctors);
        return redirect('eps')->with('mensaje','EPS agregada con exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eps  $eps
     * @return \Illuminate\Http\Response
     */
    public function show(Eps $eps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $eps
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $eps=Eps::findOrFail($id);
        return view('eps.edit', compact('eps') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $eps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'NombreEps'=>'required|string|max:100',
            'TipoAfiliado'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es Requerido',
                
    
        ];

        $this->validate($request, $campos,$mensaje);

        //
        $datosEps = request()->except(['_token','_method']);


        Eps::where('id','=',$id)->update($datosEps);
        $eps=Eps::findOrFail($id);

        return redirect('eps')->with('mensaje','Se han Modificado los datos');
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $eps
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $eps=Eps::findOrFail($id);

        return redirect('eps')->with('mensaje','Se Elimino Registro de la EPS');

    }
}
