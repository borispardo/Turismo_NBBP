<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Makaan - Inmobiliaria</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
     
    <link href="{{ asset('real/img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF-pqS3WBYs8eap_ykcP7BtlNX2kU2kvU&callback=initMap"></script>

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="{{ asset('real/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('real/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('real/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('real/css/style.css') }}" rel="stylesheet">

    <!--Importacion de JQuery-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Validation  es un framework para programar de mejor maneja en javascript-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    
    <!--Importar file input drag on drop para pdf  cdnjs  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/js/fileinput.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/css/fileinput.min.css">
    

    @stack('styles')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{ asset('real/img/icon-deal.png') }}" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Makaan</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Inicio</a>
                        <a href="#" class="nav-item nav-link">Acerca de</a>
                        <a href="#" class="nav-item nav-link">Propiedades</a>
                        <a href="#" class="nav-item nav-link">Contacto</a>
                    </div>
                    <a href="#" class="btn btn-primary px-3 d-none d-lg-flex">Agregar Propiedad</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

        <!-- Contenido -->
        <div class="container my-5">
            @yield('Contenido')
        </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contacto</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>123 Calle Principal, Quito, Ecuador</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+593 987654321</p>
                        <p><i class="fa fa-envelope me-3"></i>info@makaan.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Enlaces</h5>
                        <a class="btn btn-link text-white-50" href="#">Nosotros</a>
                        <a class="btn btn-link text-white-50" href="#">Servicios</a>
                        <a class="btn btn-link text-white-50" href="#">Política de Privacidad</a>
                        <a class="btn btn-link text-white-50" href="#">Términos</a>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h5 class="text-white mb-4">Boletín</h5>
                        <p>Suscríbete para recibir las últimas noticias.</p>
                        <div class="position-relative" style="max-width: 400px;">
                            <input class="form-control bg-transparent text-white w-100 py-3 ps-4 pe-5" type="text" placeholder="Tu correo">
                            <button type="button" class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2">Suscribirse</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Botón subir -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('real/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('real/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('real/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('real/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('real/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('real/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
