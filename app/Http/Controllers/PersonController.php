<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datos = Persona::all();
        return view('user/persona')->with(['datos' => $datos]);;
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nuevoPerson = new Persona;
        $data= request()->validate([
            'identificacion' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
        ], [
            'apellidos.required' => 'El campo Apellidos es obligatorio',
        ]);


        $nuevoPerson->identificacion = $request->identificacion;
        $nuevoPerson->nombres = $request->nombres;
        $nuevoPerson->apellidos = $request->apellidos;
        $nuevoPerson->save();
        return back()->with('agregar' , 'La nota se ha agregado correctamente');
    }
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personActualizar = Persona::findOrFail($id);
        return view('user/editar' , compact('personActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personUpdate = Persona::findOrFail($id);
       
        $personUpdate->identificacion = $request->identificacion;
        $personUpdate->nombres = $request->nombres;
        $personUpdate->apellidos = $request->apellidos;
        $personUpdate->save();
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notaEliminar = Persona::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('user' , 'La persona ha sido eliminada correctamente') ;
    }
}
