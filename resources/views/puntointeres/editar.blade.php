@extends('layout.app')

@section('Contenido')

@if(session('message'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('message') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            html: '{!! implode("<br>", $errors->all()) !!}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

<form action="{{ route('puntos.update', $interesT->id) }}" method="POST" enctype="multipart/form-data"
    style="width: 60%; margin: auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    @csrf
    @method('PUT')
    <h1 style="text-align: center;">Editar Punto</h1>

    <label for="nombre" style="font-weight: bold;">Nombre:</label><br>
    <input type="text" name="nombre" id="nombre" value="{{ $interesT->nombre }}" class="form-control" required><br>

    <label for="descripcion" style="font-weight: bold;">Descripción:</label><br>
    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" required>{{ $interesT->descripcion }}</textarea><br>

    <label for="categoria" style="font-weight: bold;">Categoría:</label><br>
    <input type="text" name="categoria" id="categoria" value="{{ $interesT->categoria }}" class="form-control" required><br>

    <label for="imagen" style="font-weight: bold;">Imagen:</label><br>
    <input type="file" name="imagen" id="imagen" class="form-control"><br>

    <label for="latitud" style="font-weight: bold;">Latitud:</label><br>
    <input readonly type="text" name="latitud" id="latitud" class="form-control" required value="{{ $interesT->latitud }}" style="background-color: #f0f0f0;"><br>

    <label for="longitud" style="font-weight: bold;">Longitud:</label><br>
    <input readonly type="text" name="longitud" id="longitud" class="form-control" required value="{{ $interesT->longitud }}" style="background-color: #f0f0f0;"><br>

    <div id="mapa_cliente" style="border: 1px solid black; height: 300px; width: 100%; margin-top: 10px; margin-bottom: 20px;"></div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('puntos.index') }}" class="btn btn-danger" style="margin-left: 10px;">Cancelar</a>
</form>

<script type="text/javascript">
    function initMap() {
        var latitud_longitud = new google.maps.LatLng({{ $interesT->latitud }}, {{ $interesT->longitud }});
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

    $(document).ready(function () {
        $("form").validate({
            rules: {
                nombre: { required: true, minlength: 3 },
                descripcion: { required: true, minlength: 5 },
                categoria: { required: true },
                latitud: { required: true, number: true },
                longitud: { required: true, number: true }
            },
            messages: {
                nombre: "Por favor ingrese el nombre (mínimo 3 caracteres)",
                descripcion: "Por favor ingrese una descripción válida",
                categoria: "Seleccione una categoría",
                latitud: "Debe seleccionar la ubicación en el mapa",
                longitud: "Debe seleccionar la ubicación en el mapa"
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });

        $("#imagen").fileinput({
            language: "es",
            allowedFileExtensions: ["png", "jpg", "jpeg"],
            showCaption: false,
            dropZoneEnabled: true,
            showClose: false,
            showUpload: false,
            browseLabel: "Seleccionar imagen",
            removeLabel: "Eliminar",
            removeClass: "btn btn-danger",
            allowedPreviewTypes: ['image'],
            maxFileSize: 2048,
            msgSizeTooLarge: "El archivo '{name}' excede el tamaño máximo permitido de 2MB.",
            msgInvalidFileExtension: "Extensión no permitida para el archivo '{name}'."
        });
    });
</script>

@endsection
