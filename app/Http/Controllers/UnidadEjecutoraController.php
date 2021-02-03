<?php

namespace App\Http\Controllers;

use App\UnidadEjecutora;
use Illuminate\Http\Request;

class UnidadEjecutoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UnidadEjecutora::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'numero' => 'required'
        ],
        [
            'numero.required'=>'Campo requerido'
        ]);
        UnidadEjecutora::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnidadEjecutora  $unidadEjecutora
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadEjecutora $unidadEjecutora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnidadEjecutora  $unidadEjecutora
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadEjecutora $unidadEjecutora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnidadEjecutora  $unidadEjecutora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadEjecutora $unidadEjecutora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnidadEjecutora  $unidadEjecutora
     * @return \Illuminate\Http\Response
     */
    public function destroy($unidadejecutora)
    {
        UnidadEjecutora::findOrFail($unidadejecutora)->delete();
        return response()->json('Unidad Ejecutora Eliminada',200);
    }
}
