@extends('layout.app')

@section('Contenido')
<div class="container">
    <h2 class="text-center mb-4">Mapa de Puntos de Interés</h2>
    <div id="mapa" style="height: 500px; width: 100%; border: 2px solid #ccc;"></div>
</div>

@push('scripts')
<script>
    function initMap() {
        const centro = { lat: -1.8312, lng: -78.1834 };
        const map = new google.maps.Map(document.getElementById("mapa"), {
            zoom: 7,
            center: centro,
        });

        @foreach($puntos as $p)
            const marcador = new google.maps.Marker({
                position: { lat: {{ $p->latitud }}, lng: {{ $p->longitud }} },
                map,
                title: "{{ $p->nombre }}",
                icon: "https://cdn-icons-png.flaticon.com/32/684/684908.png"
            });

            const infoWindow = new google.maps.InfoWindow({
                content: `<strong>{{ $p->nombre }}</strong><br>{{ $p->descripcion }}<br><em>{{ $p->categoria }}</em>`
            });

            marcador.addListener("click", () => {
                infoWindow.open(map, marcador);
            });
        @endforeach
    }
</script>
@endpush
@endsection
