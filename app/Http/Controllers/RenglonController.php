<?php

namespace App\Http\Controllers;

use App\Renglon;
use Illuminate\Http\Request;

class RenglonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Renglon::latest()->get();
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
        Renglon::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Renglon  $renglon
     * @return \Illuminate\Http\Response
     */
    public function show(Renglon $renglon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renglon  $renglon
     * @return \Illuminate\Http\Response
     */
    public function edit(Renglon $renglon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renglon  $renglon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renglon $renglon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renglon  $renglon
     * @return \Illuminate\Http\Response
     */
    public function destroy($renglon)
    {
        Renglon::findOrFail($renglon)->delete();
        return response()->json('todo ok', 200);
    }
}
