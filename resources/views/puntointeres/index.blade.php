<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>Listado de Puntos de Interés</h1>
            <a href="{{ route('puntos.create') }}" class="btn btn-primary mb-3">Agregar Punto de Interés</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Imagen</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
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
                                        <img src="{{ asset('storage/' . $interesT->imagen) }}" alt="Imagen de {{ $interesT->nombre }}" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                        No disponible
                                    @endif
                                </td>
                                <td>{{ $interesT->latitud }}</td>
                                <td>{{ $interesT->longitud }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
