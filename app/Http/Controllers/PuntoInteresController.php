<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuntoInteres; 

class PuntoInteresController extends Controller
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
    public function update(Request $request, $id)
{
    $punto = PuntoInteres::findOrFail($id);
    $punto->nombre = $request->nombre;
    $punto->descripcion = $request->descripcion;
    $punto->categoria = $request->categoria;
    $punto->latitud = $request->latitud;
    $punto->longitud = $request->longitud;

    if ($request->hasFile('imagen')) {
        $archivo = $request->file('imagen');
        $nombreArchivo = time().'_'.$archivo->getClientOriginalName();
        $archivo->move(public_path('imagenes'), $nombreArchivo);
        $punto->imagen = $nombreArchivo;
    }

    $punto->save();

    return redirect()->route('puntos.index')->with('message', 'Punto actualizado correctamente');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $interes = PuntoInteres::find($id);
        $interes->delete();
        return redirect()->route('puntos.index');
    }
}
