@extends('layout.app')

@section('Contenido')
<div class="container">
    <h1 class="text-primary">Mapa de Puntos de Interés</h1>
    
    <div id="mapa_cliente" style="border: 1px solid black; height: 600px; width: 100%; margin-top: 20px;"></div>

    <script type="text/javascript">
        function initMap() {
            alert("Cargando el mapa, por favor espere...");

            var latitud_longitud = new google.maps.LatLng({{ $puntos->first()->latitud }}, {{ $puntos->first()->longitud }});
            var mapa = new google.maps.Map(document.getElementById('mapa_cliente'), {
                center: latitud_longitud,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var marcador = new google.maps.Marker({
                position: latitud_longitud,
                map: mapa,
                title: "Seleccione la dirección",
                draggable: true
            });

            google.maps.event.addListener(marcador, 'dragend', function () {
                var latitud = this.getPosition().lat();
                var longitud = this.getPosition().lng();
                document.getElementById("latitud").value = latitud;
                document.getElementById("longitud").value = longitud;
            });
        }
    </script>
</div>
@endsection