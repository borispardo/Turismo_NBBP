@extends('layout.app')

@section('Contenido')
<br>
<h1>MAPA DE PUNTOS</h1>
<br>
<div class="container-fluid">
    <div id="mapa-puntos" style="border: 1px solid black; height: 500px; width: 100%; margin-top: 10px; margin-bottom: 20px;"></div>
</div>

<script type="text/javascript">
    function initMap() {
        var latlng = new google.maps.LatLng(-0.9374805, -78.6161327);
        var mapa = new google.maps.Map(document.getElementById('mapa-puntos'), {
            center: latlng,
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        @foreach($puntos as $playa)
            var punto = new google.maps.LatLng({{ $playa->latitud }}, {{ $playa->longitud }});
            var marcador = new google.maps.Marker({
                position: punto,
                map: mapa,
                icon: 'https://cdn-icons-png.flaticon.com/32/1077/1077012.png',
                title: "{{ $playa->nombre }}",
                draggable: false
            });
        @endforeach
    }    

    window.onload = function() {
        initMap();
    };
</script>

@endsection
