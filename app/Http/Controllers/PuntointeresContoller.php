<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuntointeresContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interes= puntointeres::all();
        return view('puntointeres.index',compact('interes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('puntointeres.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'imagen' => $request->imagen,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ];
        puntointeres::create($datos);
        return redirect()->route('puntos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
