@extends('layouts.main_pro')

@section('content')

@include('partials.status-panel')

<div class="container-fluid slider-section nopad home-section con-home-premios">
	<div class="container">
		<h1 class="smartwatch-title"></h1>
		<div class="col-sm-12 slider-container">
			<div id="myCarousel" class="carousel slide col-sm-12" data-ride="carousel">
			  <!-- Wrapper for slides -->
				<div class="carousel-inner col-sm-12" role="listbox">
					<div class="item active">
					   <img id="con-prem1" src="/assets_pro/img/premio/1.png" alt="" width="100%">
					   <img id="con-prem1-cel" src="/assets_pro/img/premio/cel-1.png" alt="" width="100%">
					</div>
					<div class="item">
					   <img id="con-prem1" src="/assets_pro/img/premio/2.png" alt="" width="100%">
					   <img id="con-prem1-cel" src="/assets_pro/img/premio/cel-2.png" alt="" width="100%">
					</div>
                    <div class="item">
                        <img id="con-prem1" src="/assets_pro/img/premio/3.png" alt="" width="100%">
                        <img id="con-prem1-cel" src="/assets_pro/img/premio/cel-3.png" alt="" width="100%">
                    </div>
                    <div class="item">
                        <img id="con-prem1" src="/assets_pro/img/premio/4.png" alt="" width="100%">
                        <img id="con-prem1-cel" src="/assets_pro/img/premio/cel-4.png" alt="" width="100%">
                    </div>
                    <div class="item">
                        <img id="con-prem1" src="/assets_pro/img/premio/5.png" alt="" width="100%">
                        <img id="con-prem1-cel" src="/assets_pro/img/premio/cel-5.png" alt="" width="100%">
                    </div>
                    <div class="item">
                        <img id="con-prem1" src="/assets_pro/img/premio/6.png" alt="" width="100%"> 
                        <img id="con-prem1-cel" src="/assets_pro/img/premio/cel-6.png" alt="" width="100%">
                    </div>
				  <!-- Left and right controls -->
				  <a class="left carousel-control con-preml-cel" href="#myCarousel" role="button" data-slide="prev">
					<img src="/assets_pro/img/pre.png">
				  </a>
				  <a class="right carousel-control con-preml-cel" href="#myCarousel" role="button" data-slide="next">
					<img src="/assets_pro/img/next.png">
				  </a>
				</div>
			</div>
		</div>
	</div>
</div>


@stop