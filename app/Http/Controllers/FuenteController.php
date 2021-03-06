<?php

namespace App\Http\Controllers;

use App\Fuente;
use Illuminate\Http\Request;

class FuenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Fuente::latest()->get();
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
        Fuente::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fuente  $fuente
     * @return \Illuminate\Http\Response
     */
    public function show(Fuente $fuente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fuente  $fuente
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuente $fuente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fuente  $fuente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuente $fuente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fuente  $fuente
     * @return \Illuminate\Http\Response
     */
    public function destroy($fuente)
    {
        Fuente::findOrFail($fuente)->delete();
        return response()->json('todo ok', 200);
    }
}
