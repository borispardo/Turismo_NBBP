@extends('layout.app')

@section('Contenido')
<div class="container">
    <h1 class = "text-primary">Puntos de Interés</h1>

    <a href="{{ route('puntos.create') }}" class="btn btn-primary mb-3">Agregar Punto de Interés</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ url('puntos/mapa') }}" class="btn btn-primary mb-3">Mapa de Puntos de Interés</a>
    &nbsp;&nbsp;&nbsp;&nbsp;

    <table class="table table-bordered table-striped table-hover mt-5">
        <thead class="thead-dark">
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
            @foreach($puntos as $interesT)
                <tr>
                    <td>{{ $interesT->nombre }}</td>
                    <td>{{ $interesT->descripcion }}</td>
                    <td>{{ $interesT->categoria }}</td>
                    <td>
                        @if($interesT->imagen)
                            <img src="{{ asset('storage/' . $interesT->imagen) }}" whdth="90"  alt="Imagen de {{ $interesT->nombre }}" class="img-thumbnail" style="max-width: 100px;">
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>{{ $interesT->latitud }}</td>
                    <td>{{ $interesT->longitud }}</td>
                    <td>
                        <a href="{{ route('puntos.edit', $interesT->id) }}" class="btn btn-warning" title="Editar"> 
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('puntos.destroy', $interesT->id) }}" method="POST" class="d-inline" id="eliminar-form-{{ $interesT->id }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" title="Eliminar">
                            <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
