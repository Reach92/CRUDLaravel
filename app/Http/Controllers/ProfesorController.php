<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;


class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor = Profesor::paginate(5);
        return view('profesor.index')->with('profesores',$profesor);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesor.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15', 'correo' => 'required|max:50', 'ocupacion' => 'required|max:30'
        ]);
        $profesor = Profesor::create($request->only('name','correo','ocupacion'));
        Session::flash('mensaje','Registro creado con Exito');
        return redirect()->route('profesor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        return view('profesor.form')->with('profesor',$profesor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'name' => 'required|max:15', 'correo' => 'required|max:50', 'ocupacion' => 'required|max:30'
        ]);
        $profesor->name = $request['name'];
        $profesor->correo = $request['correo'];        
        $profesor->ocupacion = $request['ocupacion'];
        $profesor->save(); 

        Session::flash('mensaje','Registro editado con éxito');
        return redirect()->route('profesor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        Session::flash('mensaje','Registro eliminado con éxito');
        return redirect()->route('profesor.index');
    }
}