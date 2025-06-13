@extends('layout.app')

@section('Contenido')
<div class="container">
    <h1 class="text-primary mt-3">Puntos de Interés</h1>

    <a href="{{ route('puntos.create') }}" class="btn btn-primary mb-3">Agregar Punto de Interés</a>
    <a href="{{ route('puntos.mapa') }}" class="btn btn-success mb-3">Mapa de Puntos</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($puntos as $punto)
                <tr>
                    <td>{{ $punto->nombre }}</td>
                    <td>{{ $punto->descripcion }}</td>
                    <td>{{ $punto->categoria }}</td>
                    <td>
                        @if($punto->imagen)
                            <img src="{{ asset('imagenes/' . $punto->imagen) }}" alt="{{ $punto->nombre }}" style="max-width: 100px;">
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>{{ $punto->latitud }}</td>
                    <td>{{ $punto->longitud }}</td>
                    <td>
                        <a href="{{ route('puntos.edit', $punto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('puntos.destroy', $punto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este punto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
