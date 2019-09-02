<?php

namespace App\Http\Controllers;

use App\Recurso;
use App\Persona;
use Illuminate\Support\Facades\DB;
use App\Asignacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsignacionController extends Controller
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
        $datos = DB::table('asignacion')
            ->join('person', 'asignacion.id_persona', '=', 'person.id')
            ->join('resource', 'asignacion.id_recurso', '=', 'resource.id')
            ->select('asignacion.*', 'person.nombres AS nombrePer', 'resource.nombre')
            ->get();

          

        return view('asignacion/asignacion')->with(['datos' => $datos]);;
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
       
    
    }

    public function asignarProduct(Request $request)
    {
      
        $nuevaAsignacion = new Asignacion;
        $nuevaAsignacion->id_recurso= $request->id_recurso;
        $nuevaAsignacion->id_persona= $request->selectPerson;
        $nuevaAsignacion->save();

        return back()->with('agregar' , 'El recurso se ha agregado correctamente');
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
