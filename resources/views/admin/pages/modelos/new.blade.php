@extends('admin.layouts.master')

@section('title', 'Modelos')


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Agregando modelo</h1>
  </div>
</div>

{{Form::open(['route' => ['modelos.store'],'files' => true])}}
  <div class="row bg_blanco">
    <div class="col-xs-12 col-sm-12 col-md-3">
      <label>Tipo de Producto</label>
      {{Form::select('tipo_producto_id', $tipos, NULL, ['class'=>'form-control'])}}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3">
      <label>Marcas</label> <!-- dependiendo el tipo de producto que se seleccione, son las marcas que deben de aparecer -->
      {{Form::select('marcas_id', $marcas, NULL, ['class'=>'form-control'])}}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
      <label for="">Nombre </label>{{Form::text('nombre', NULL, ['class'=>'form-control'])}} <!-- VALIDAR que no se repitan los nombres de modelo en el mismo tipo de producto. -->
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
  </div> <!-- FIN ROW -->
{{Form::close()}}
@endsection