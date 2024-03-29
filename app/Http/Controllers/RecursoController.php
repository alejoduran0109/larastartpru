<?php

namespace App\Http\Controllers;

use App\Recurso;
use App\Persona;
use App\Asignacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecursoController extends Controller
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
       
        $datos = Recurso::all();
        $personas = Persona::all();
        return view('recurso/recurso')->with(['datos' => $datos, 'personas'=> $personas]);
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
       
        $nuevoRecurso = new Recurso;
        $data= request()->validate([
            'categoria' => 'required',
            'codigo' => 'required',
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El campo Apellidos es obligatorio',
        ]);


        $nuevoRecurso->categoria = $request->categoria;
        $nuevoRecurso->codigo = $request->codigo;
        $nuevoRecurso->nombre = $request->nombre;
        $nuevoRecurso->marca = $request->marca;
        $nuevoRecurso->serie = $request->serie;
        
        $nuevoRecurso->save();
        return back()->with('agregar' , 'El recurso se ha agregado correctamente');
    }

    public function asignarProduct(Request $request)
    {
    
        $nuevaAsignacion = new Asignacion;
     
        if ($nuevaAsignacion->where('id_recurso', '=', $request->id_recurso)->where('id_persona','=', $request->selectPerson)->exists()) { 

        return back()->with('message' , 'Este recurso ya se encuentra asignado');
     
    }
       
        
        $nuevaAsignacion->id_recurso= $request->id_recurso;
        $nuevaAsignacion->id_persona= $request->selectPerson;
        $nuevaAsignacion->save();

        return back()->with('success' , 'El recurso se ha agregado correctamente');
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
        $recursoActualizar = Recurso::findOrFail($id);
        return view('recurso/editar' , compact('recursoActualizar'));
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
        $recursoUpdate = Recurso::findOrFail($id);
       
        $recursoUpdate->categoria = $request->categoria;
        $recursoUpdate->codigo = $request->codigo;
        $recursoUpdate->nombre = $request->nombre;
        $recursoUpdate->marca = $request->marca;
        $recursoUpdate->serie = $request->serie;
        $recursoUpdate->save();
        return redirect('recurso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recursoEliminar = Recurso::findOrFail($id);
        $recursoEliminar->delete();
        return back()->with('recurso' , 'La persona ha sido eliminada correctamente') ;
    }

  
}
