<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuntoInteres; 

class PuntoInteresContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos= PuntoInteres::all();
        return view('puntointeres.index',compact('puntos'));
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
        PuntoInteres::create($datos);
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
        $interesT = PuntoInteres::find($id);
        return view('puntointeres.editar',compact('interesT'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $interes = PuntoInteres::findOrFail($id);

        $rutaImagen = $interes->hasFile('imagen') 
        ? $request->file('imagen')->store('puntointeres', 'public') 
        : $interes->imagen;

        $datos = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'imagen' => $rutaImagen,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ];

        $interes->update($datos);
        return redirect()->route('puntos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
