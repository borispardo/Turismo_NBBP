@extends('layout.app')

@section('Contenido')
<div class="container">
    <h2 class="text-center mb-4">Mapa de Puntos de Interés</h2>
    <div id="mapa" style="height: 500px; width: 100%; border: 2px solid #ccc; margin-bottom: 20px;"></div>
    <a href="{{ route('puntos.index') }}" class="btn btn-primary">Volver a la lista de puntos</a>
</div>
<script>
    function initMap() {
        var ubicacionInicial = { lat: -0.9374805, lng: -78.6161327 };
        var mapa = new google.maps.Map(document.getElementById('mapa'), {
            zoom: 12,
            center: ubicacionInicial
        });

        @foreach($puntos as $punto)
            var marker = new google.maps.Marker({
                position: { lat: {{ $punto->latitud }}, lng: {{ $punto->longitud }} },
                map: mapa,
                title: '{{ $punto->nombre }}'
            });
        @endforeach
    }
    document.addEventListener('DOMContentLoaded', function() {
        initMap();
    });
</script>


@endsection


