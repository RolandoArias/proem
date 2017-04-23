@extends('layouts.main_pro')

@section('content')
    <style>
        body{
            overflow: hidden;
        }
    </style>
    @include('partials.status-panel')

    <div class="container-fluid home-section con-home nopad">
    
        <div class="container nopad">
            <div class="col-sm-12 top-title nopad con-soso">
                <img class="animated slideInLeft " src="{{ asset('assets_pro/img/hometitlehalf.png')}}" alt="" width="100%" />
                <img class="soso animated zoomIn" src="{{ asset('assets_pro/img/hometitlesoso.png')}}" alt="" width="100%" />
            </div>
        </div>

        <div class="col-sm-12 slider-container">
            <div id="myCarousel" class="carousel slide col-sm-12" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner col-sm-12" role="listbox">
                    <div class="item active">
                        <!--<img src="{{ asset('assets_pro/img/allhero.png')}}" alt="" width="100%">-->
                        <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-desk">
                            <img src="{{ asset('assets_pro/img/allhero.png')}}" width="100%">
                        </div>
                           <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-cel">
                             <img class="con-hero-capi" src="{{ asset('assets_pro/img/allhero-2.png')}}" width="100%">
                        </div>
                    </div>
                    
                    <div class="item">
                        <img id="allhero-slider" src="{{ asset('assets_pro/img/slideJJG.png')}}" alt="" width="100%">
                        <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-cel">
                           <img class="con-hero-black" src="{{ asset('assets_pro/img/allhero-1.png')}}" width="100%">
                           
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-desk">
                            <img src="{{ asset('assets_pro/img/allhero.png')}}" width="100%">
                        </div>
                           <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-cel">
                            <img class="con-rules-cel" src="{{ asset('assets_pro/img/slideJJG-1.png')}}" width="100%">
                        </div>
                    </div>
                    
                     <div class="item">
                        <img id="allhero-slider" src="{{ asset('assets_pro/img/slideJJG.png')}}" alt="" width="100%">
                        <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-cel">
                            <img class="con-hero-iron" src="{{ asset('assets_pro/img/allhero-3.png')}}" width="100%">
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-desk">
                            <img src="{{ asset('assets_pro/img/allhero.png')}}" width="100%">
                        </div>
                           <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-cel">
                            <img class="con-hero-thor" src="{{ asset('assets_pro/img/allhero-4.png')}}" width="100%">
                        </div>
                    </div>
                    
                    <div class="item">
                        <img id="allhero-slider" src="{{ asset('assets_pro/img/slideJJG.png')}}" alt="" width="100%">
                        <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-cel">
                            <img class="con-rules-cel" src="{{ asset('assets_pro/img/slideJJG-2.png')}}" width="100%">
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-desk">
                            <img src="{{ asset('assets_pro/img/allhero.png')}}" width="100%">
                        </div>
                           <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-cel">
                            <img class="con-hero-hulk" src="{{ asset('assets_pro/img/allhero-5.png')}}" width="100%">
                        </div>
                    </div>
                    
                    <div class="item">
                        <img id="allhero-slider" src="{{ asset('assets_pro/img/slideJJG.png')}}" alt="" width="100%">
                        <div class="col-sm-12 animated zoomInDown home-allhero con-allhero-cel">
                            <img class="con-rules-cel" src="{{ asset('assets_pro/img/slideJJG-3.png')}}" width="100%">
                        </div>
                    </div>
                    
                    
                     
                    

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <img class="con-prev-cel" src="{{ asset('assets_pro/img/pre.png')}}">
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <img class="con-prev-cel" src="{{ asset('assets_pro/img/next.png')}}">
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop