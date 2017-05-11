<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Proveedora de Equipos Mineros - PROMIN - Mexico / USA</title>
    <meta name="keywords" content="mineria, construccion, agricultura, scoop tram, maquinaria para mineria, maquinaria para construccion, maquinaria para agricultura, maquinaria pesada, proveedora de equipos mineros">
    <meta name="description" content="Asesores en Maquinaria para Mineria, Construcción y Agricultura.">

    <link rel="shortcut icon" href="{{url('favicon.ico')}}">
    
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/style.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/stilos.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    

<!-- Preloader -->
@include('front.includes.area_preloader')


<!-- Chat -->
@include('front.includes.area_chat')

<!-- Top Datos -->
@if(Auth::guest())
    @include('front.includes.area_top_dato')
@else
    @include("front.includes.area_top_datos_login")
@endif
<!-- WRAPPER -->
<div class="wrapper">
    
    <!-- MENU -->
    @include('front.includes.inicio_menu')

    @if($carousel)
    <!-- CARRUSEL -->
    @include('front.includes.inicio_carrusel')
    @endif
    
    <!-- CONTENT -->
    <div class="content">
        
        <!-- CONTENIDO -->
        @yield('content')

        <!-- NEWSLETTER -->
        @include('front.includes.area_newsletter2')
        
    </div>
    <!-- /.content -->

</div>
<!-- /.wrapper -->



<!-- FOOTER -->
@include('front.includes.area_footer')

<!-- LOGIN -->
@include('front.includes.area_login')

<!-- Crear Cuenta -->
@include('front.includes.area_crear_cuenta')

<!-- ScrollTop Button -->
@include('front.includes.area_boton_scroll')



<script src="{{url('assets/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/jquery.plugins.min.js')}}"></script>
<script src="{{url('assets/js/custom.min.js')}}"></script>
<script src="{{url('assets/js/promin.js')}}"></script>
<script>
    var player = new MediaElementPlayer('#player1');
</script>
 @yield('js-script')
</body>

</html>