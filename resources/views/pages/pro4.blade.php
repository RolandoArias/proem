@extends('layouts.main_pro')

@section('content')

    @include('partials.status-panel')

<div class="container-fluid home-section home-section-prod nopad">
	<div class="container pro1-inner con-prod-desk">
		<div class="col-sm-6 pro1-inner-1 animated slideInLeft">
			<img src="/assets_pro/img/prologo4pro.png" width="100%">
		</div>
		<div class="col-sm-5 pro1-inner-2 text-center animated zoomIn con-pro-bgi">
			<p class="pro-img col-sm-8">
				<img src="/assets_pro/img/prologo4.png">
			</p>
			<p class="col-sm-8 titlepro animated fadeIn">PRESENTACIONES</p>
			<p class="col-sm-8 subpro animated fadeIn">198.4g</p>
			<p class="col-sm-8 subpro animated fadeIn">310g</p>
			<p class="col-sm-8 subpro animated fadeIn">720g</p>
			<p class="col-sm-8 subpro con-subdesk animated fadeIn leyend con-leyend">Búscanos en tu tienda favorita</p>
			
		</div>
	</div>
	
	
	
	<div class="container pro1-inner con-prod-cel">
	<div id="myCarousel" class="carousel slide col-sm-12" data-ride="carousel">
			  <!-- Wrapper for slides -->
				<div class="carousel-inner col-sm-6 pro1-inner-1 animated slideInLeft" role="listbox">
					<div class="item active" id="con-title-prod">
                   <img class="animated slideInLeft " id="con-juega-prod" src="{{ asset('assets_pro/img/hometitlehalf.png')}}" alt="" width="100%" />
                <img class="soso animated zoomIn" id="con-juega-prod" src="{{ asset('assets_pro/img/hometitlesoso.png')}}" alt="" width="100%" />
					   <img class="con-prod-carr animated zoomInDown" src="/assets_pro/img/prologo4pro.png" width="100%">
					</div>
					<div class="item">
                  <div class="col-xs-12 pro1-inner-2 text-center con-pro-bgi con-prod-carr animated zoomInDown">
                   <p class="pro-img col-xs-12">
					  <img src="/assets_pro/img/prologo4.png">
                        </p>
            <p class="col-sm-8 titlepro con-title animated fadeIn">PRESENTACIONES</p>
			<p class="col-sm-8 subpro con-subtitle animated fadeIn">198.4g</p>
			<p class="col-sm-8 subpro con-subtitle animated fadeIn">310g</p>
			<p class="col-sm-8 subpro con-subtitle animated fadeIn">720g</p>
			<p class="col-sm-8 subpro con-subfoot animated fadeIn leyend con-leyend">Búscanos en tu tienda favorita</p>
					</div>
                    </div>
				  <!-- Left and right controls -->
				  <a class="left carousel-control con-prod-left" href="#myCarousel" role="button" data-slide="prev">
					<img src="/assets_pro/img/pre.png">
				  </a>
				  <a class="right carousel-control con-prod-left" href="#myCarousel" role="button" data-slide="next">
					<img src="/assets_pro/img/next.png">
				  </a>
				</div>
			</div>
	
	
		
			
	
		
	
			
		</div>
	</div>
	


@stop