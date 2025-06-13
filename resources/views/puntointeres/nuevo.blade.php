<form action="{{ route('puntos.store') }}" method="post" enctype="multipart/form-data"
    style="width: 60%; margin: auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    @csrf
    <h1 style="text-align: center;">Registrar Nuevo Punto</h1>

    <label for="nombre" style="font-weight: bold;">Nombre:</label><br>
    <input type="text" name="nombre" id="nombre" class="form-control" required><br>

    <label for="descripcion" style="font-weight: bold;">Descripción:</label><br>
    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" required></textarea><br>

    <label for="categoria" style="font-weight: bold;">Categoría:</label><br>
    <input type="text" name="categoria" id="categoria" class="form-control" required><br>

    <label for="imagen" style="font-weight: bold;">Imagen:</label><br>
    <input type="file" name="imagen" id="imagen" class="form-control"><br>

    <label for="latitud" style="font-weight: bold;">Latitud:</label><br>
    <input readonly type="text" name="latitud" id="latitud" class="form-control" style="background-color: #f0f0f0;" required><br>

    <label for="longitud" style="font-weight: bold;">Longitud:</label><br>
    <input readonly type="text" name="longitud" id="longitud" class="form-control" style="background-color: #f0f0f0;" required><br>

    <div id="mapa_cliente" style="border: 1px solid black; height: 300px; width: 100%; margin-top: 10px; margin-bottom: 20px;"></div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('puntos.index') }}" class="btn btn-danger" style="margin-left: 10px;">Cancelar</a>
</form>

<script type="text/javascript">
    function initMap() {
        var latitud_longitud = new google.maps.LatLng(-0.9374805, -78.6161327);
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