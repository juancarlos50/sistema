<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['doctors']=Doctor::paginate(2);
        return view('doctors.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('doctors.create');
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
                'NombreDoctor'=>'required|string|max:100',
                'TipoidDoctor'=>'required|string|max:100',
                'NumeroidDoctor'=>'required|string|max:100',
                'DireccionDoctor'=>'required|string|max:100',
                'TelefonoDoctor'=>'required|string|max:100',
                'EmailDoctor'=>'required|email',
                'ImagenDoctor'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
                'required'=>'El :attribute es Requerido',
                'ImagenDoctor.required'=>'La Foto es Requerida'

        ];

        $this->validate($request, $campos,$mensaje);


        //$datosDoctors = request()->all();
        $datosDoctors = request()->except('_token');

        if($request->hasFile('ImagenDoctor')){
            $datosDoctors['ImagenDoctor']=$request->file('ImagenDoctor')->store('uploads','public');
        }
        Doctor::insert($datosDoctors);

        // return response()->json($datosDoctors);
        return redirect('doctors')->with('mensaje','Doctor agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $doctors=Doctor::findOrFail($id);
        return view('doctors.edit', compact('doctors') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $campos=[
            'NombreDoctor'=>'required|string|max:100',
            'TipoidDoctor'=>'required|string|max:100',
            'NumeroidDoctor'=>'required|string|max:100',
            'DireccionDoctor'=>'required|string|max:100',
            'TelefonoDoctor'=>'required|string|max:100',
            'EmailDoctor'=>'required|email',
            
    ];
    $mensaje=[
            'required'=>'El :attribute es Requerido',
            

    ];

    if($request->hasFile('ImagenDoctor')){
        $campos=['ImagenDoctor'=>'required|max:10000|mimes:jpeg,png,jpg'];
        $mensaje=['ImagenDoctor.required'=>'La Foto es Requerida'];
    }

    $this->validate($request, $campos,$mensaje);


        //
        $datosDoctors = request()->except(['_token','_method']);

        if($request->hasFile('ImagenDoctor')){
            $doctors=Doctor::findOrFail($id);

            Storage::delete('public/'.$doctors->ImagenDoctor);

            $datosDoctors['ImagenDoctor']=$request->file('ImagenDoctor')->store('uploads','public');
        }
        


        Doctor::where('id','=',$id)->update($datosDoctors);
        $doctors=Doctor::findOrFail($id);
        //return view('doctors.edit', compact('doctors') );

        return redirect('doctors')->with('mensaje','Se han Modificado los datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $doctors=Doctor::findOrFail($id);

        if(Storage::delete('public/'.$doctors->ImagenDoctor)){
            Doctor::destroy($id);
        }

       

        return redirect('doctors')->with('mensaje','Se Elimino Registro de Doctor');
    }
}
