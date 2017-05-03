@extends('layouts.main_pro')

@section('content')

    @include('partials.status-panel')

    <div class="container-fluid home-section nopad con-allprod">
	<div class="container nopad con-allprod-cel">
		<div class="col-sm-12 four-pro nopad">
			<a href="/pro3" class="pro1 col-sm-3 col-xs-6 nopad">
				<img class="allpro11 animated slideInDown" src="/assets_pro/img/allpro11.png" alt=""  width="100%"/>
				<img class="allpro12 animated zoomIn" src="/assets_pro/img/allpro12.png" alt=""  width="100%"/>
			</a>
			<a href="/pro4" class="pro2 col-sm-3 col-xs-6 nopad">
				<img class="allpro21 animated slideInDown" src="/assets_pro/img/allpro21.png" alt="" width="100%"/>
				<img class="allpro22 animated zoomIn" src="/assets_pro/img/allpro22.png" alt="" width="100%"/>
			</a>
			<a href="/pro1" class="pro3 col-sm-3 col-xs-6 nopad">
				<img class="allpro31 animated slideInDown" src="/assets_pro/img/allpro31.png" alt="" width="100%"/>
				<img class="allpro32 animated zoomIn" src="/assets_pro/img/allpro32.png" alt="" width="100%"/>
			</a>
			<a href="/pro2" class="pro4 col-sm-3 col-xs-6 nopad">
				<img class="allpro41 animated slideInDown" src="/assets_pro/img/allpro41.png" alt="" width="100%"/>
				<img class="allpro42 animated zoomIn" src="/assets_pro/img/allpro42.png" alt="" width="100%"/>
			</a>
		</div>
	</div>
</div>

@stop