@extends('layout.app')

@section('Contenido')
<div class="container">
    <h1 class="text-primary mt-3">Puntos de Interés</h1>

    <a href="{{ route('puntos.create') }}" class="btn btn-primary mb-3">Agregar Punto de Interés</a>
    <a href="{{ url('puntos/mapa') }}" class="btn btn-success mb-3">Mapa de Puntos</a>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar'
            });
        </script>
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

                        <form action="{{ route('puntos.destroy', $punto->id) }}" method="POST" class="form-eliminar d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm eliminar-btn" data-nombre="{{ $punto->nombre }}">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Librería SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const eliminarBtns = document.querySelectorAll('.eliminar-btn');

        eliminarBtns.forEach(boton => {
            boton.addEventListener('click', function (e) {
                e.preventDefault();
                const form = this.closest('form');
                const nombre = this.dataset.nombre;

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: `Esta acción eliminará el punto: "${nombre}"`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection
