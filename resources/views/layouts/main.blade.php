<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Proveedora de Equipos Mineros - PROMIN - Mexico / USA</title>
    <meta name="keywords" content="mineria, construccion, agricultura, scoop tram, maquinaria para mineria, maquinaria para construccion, maquinaria para agricultura, maquinaria pesada, proveedora de equipos mineros">
    <meta name="description" content="Asesores en Maquinaria para Mineria, Construcción y Agricultura.">

    <link rel="shortcut icon" href="{{url('assets/promin.ico')}}">
    
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/style.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/stilos.css')}}" rel="stylesheet">
    
</head>
<body>

    

<!-- Preloader -->
@include('includes.area_preloader')


<!-- Chat -->
@include('includes.area_chat')

<!-- Top Datos -->
@include('includes.area_top_dato')

<!-- WRAPPER -->
<div class="wrapper">
    
    <!-- MENU -->
    @include('includes.inicio_menu')

    <!-- CARRUSEL -->
    @include('includes.inicio_carrusel')
    
    <!-- CONTENT -->
    <div class="content">
        
        <!-- CONTENIDO -->
        @include('includes.inicio_contenido')

        <!-- NEWSLETTER -->
        @include('includes.area_newsletter2')
        
    </div>
    <!-- /.content -->

</div>
<!-- /.wrapper -->



<!-- FOOTER -->
@include('includes.area_footer')

<!-- LOGIN -->
@include('includes.area_login')

<!-- Crear Cuenta -->
@include('includes.area_crear_cuenta')

<!-- ScrollTop Button -->
@include('includes.area_boton_scroll')



<script src="{{url('assets/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/jquery.plugins.min.js')}}"></script>
<script src="{{url('assets/js/custom.min.js')}}"></script>
<script>
    var player = new MediaElementPlayer('#player1');
</script>

</body>

</html>