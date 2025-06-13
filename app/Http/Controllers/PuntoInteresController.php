<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuntoInteres;

class PuntoInteresController extends Controller
{
    public function index()
    {
        $puntos = PuntoInteres::all();
        return view('puntointeres.index', compact('puntos'));
    }

    public function mapa()
    {
        $puntos = PuntoInteres::all();
        return view('puntointeres.mapa', compact('puntos'));
    }

    public function create()
    {
        return view('puntointeres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $datos = $request->only(['nombre', 'descripcion', 'categoria', 'latitud', 'longitud']);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes'), $nombreArchivo);
            $datos['imagen'] = $nombreArchivo;
        }

        PuntoInteres::create($datos);

        return redirect()->route('puntos.index')->with('success', 'Punto creado correctamente');
    }

    public function edit($id)
    {
        $punto = PuntoInteres::findOrFail($id);
        return view('puntointeres.edit', compact('punto'));
    }

    public function update(Request $request, $id)
    {
        $punto = PuntoInteres::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $punto->nombre = $request->nombre;
        $punto->descripcion = $request->descripcion;
        $punto->categoria = $request->categoria;
        $punto->latitud = $request->latitud;
        $punto->longitud = $request->longitud;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes'), $nombreArchivo);
            $punto->imagen = $nombreArchivo;
        }

        $punto->save();

        return redirect()->route('puntos.index')->with('success', 'Punto actualizado correctamente');
    }

    public function destroy($id)
    {
        $punto = PuntoInteres::findOrFail($id);
        $punto->delete();

        return redirect()->route('puntos.index')->with('success', 'Punto eliminado correctamente');
    }
}
