@extends('layout.app')

@section('Contenido')

@if(session('message'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('message') }}',
            confirmButtonColor: '#28a745'
        });
    </script>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <strong>¡Error!</strong> Por favor corrige los siguientes errores:
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="puntoForm" action="{{ route('puntos.store') }}" method="post" enctype="multipart/form-data"
    style="width: 60%; margin: auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    @csrf
    <h1 style="text-align: center;">Registrar Nuevo Punto</h1>

    <label for="nombre" style="font-weight: bold;">Nombre:</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required><br>

    <label for="descripcion" style="font-weight: bold;">Descripción:</label>
    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" required></textarea><br>

    <label for="categoria" style="font-weight: bold;">Categoría:</label>
    <input type="text" name="categoria" id="categoria" class="form-control" required><br>

    <label for="imagen" style="font-weight: bold;">Imagen:</label>
    <input type="file" name="imagen" id="imagen" class="file" required><br><br>

    <label for="latitud" style="font-weight: bold;">Latitud:</label>
    <input readonly type="text" name="latitud" id="latitud" class="form-control" style="background-color: #f0f0f0;" required><br>

    <label for="longitud" style="font-weight: bold;">Longitud:</label>
    <input readonly type="text" name="longitud" id="longitud" class="form-control" style="background-color: #f0f0f0;" required><br>

    <div id="mapa_cliente" style="border: 1px solid black; height: 300px; width: 100%; margin-top: 10px; margin-bottom: 20px;"></div>

    <button type="submit" class="btn btn-success">Guardar</button>

    <a href="{{ route('puntos.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Cancelar
        <i class="bi bi-arrow-left"></i>
    </a>
    
</form>

@push('scripts')

<script>
    function initMap() {
        const ubicacionInicial = { lat: -0.9374805, lng: -78.6161327 };

        const mapa = new google.maps.Map(document.getElementById('mapa_cliente'), {
            zoom: 15,
            center: ubicacionInicial,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        const marcador = new google.maps.Marker({
            position: ubicacionInicial,
            map: mapa,
            title: "Arrastra para seleccionar ubicación",
            draggable: true
        });

        google.maps.event.addListener(marcador, 'dragend', function () {
            const lat = this.getPosition().lat();
            const lng = this.getPosition().lng();
            document.getElementById("latitud").value = lat;
            document.getElementById("longitud").value = lng;
        });
    }

    $(document).ready(function () {
        // Validación del formulario
        $("#puntoForm").validate({
            rules: {
                nombre: { required: true, minlength: 3 },
                descripcion: { required: true, minlength: 5 },
                categoria: { required: true },
                imagen: { required: true },
                latitud: { required: true, number: true },
                longitud: { required: true, number: true }
            },
            messages: {
                nombre: "Por favor ingrese el nombre (mínimo 3 caracteres)",
                descripcion: "Por favor ingrese una descripción válida",
                categoria: "Seleccione una categoría",
                imagen: "Debe seleccionar una imagen",
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

        // Fileinput
        $("#imagen").fileinput({
            language: "es",
            allowedFileExtensions: ["png", "jpg", "jpeg"],
            maxFileSize: 2048,
            showUpload: false,
            showRemove: true,
            dropZoneEnabled: true,
            browseLabel: "Seleccionar imagen",
            removeLabel: "Eliminar",
            msgSizeTooLarge: "El archivo excede el tamaño máximo permitido de 2MB.",
            msgInvalidFileExtension: "Solo se permiten imágenes PNG, JPG o JPEG."
        });

        // Confirmación al cancelar
        $('#btnCancelar').on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se perderán los datos no guardados.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, cancelar',
                cancelButtonText: 'No, continuar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('puntos.index') }}";
                }
            });
        });
    });
</script>
@endpush

@endsection
