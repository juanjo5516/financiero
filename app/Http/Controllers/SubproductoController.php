<?php

namespace App\Http\Controllers;

use App\Subproducto;
use Illuminate\Http\Request;

class SubproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Subproducto::latest()->get(), 200);
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
        Subproducto::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subproducto  $subproducto
     * @return \Illuminate\Http\Response
     */
    public function show(Subproducto $subproducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subproducto  $subproducto
     * @return \Illuminate\Http\Response
     */
    public function edit(Subproducto $subproducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subproducto  $subproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subproducto $subproducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subproducto  $subproducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subproducto $subproducto)
    {
        //
    }
}
