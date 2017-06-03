@extends('admin.layouts.master')

@section('title', 'Noticias')


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Agregando noticia</h1>
  </div>
</div>
<style type="text/css">
  textarea { height: 100px !important; }
</style>
{{Form::open(['route' => ['noticias.store'],'files' => true])}}
  <div class="row bg_blanco">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <label for="">Título </label>{{Form::text('title', NULL, ['class'=>'form-control'])}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label for="">Contenido </label>{{Form::textarea('content', NULL, ['class'=>'form-control'])}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Tipo de Noticia</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline">{{Form::radio('type', '1', false)}} Interna</label></li>
            <li><label class="radio-inline">{{Form::radio('type', '0', false)}} Promin.mx</label></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Status de Noticia</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline">{{Form::radio('state', '1', false,['class'=>'state'])}} Normal</label></li>
            <li><label class="radio-inline">{{Form::radio('state', '0', false,['class'=>'state'])}} URGENTE</label></li> <!-- sólo si se selecciona esta opción, mostrar el textarea, para que ahí se capturen los emails-->
          </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" id="mails" style="display: none;">
          <label for="">Para: </label> <span>Ingresa los emails separados por coma.</span>
          {{Form::textarea('title', NULL,['class'=>'form-control','placeholder'=>'Ejemplo: info@promin.mx, contacto@promin.mx'])}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Imagen / Video de Noticia</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline">{{Form::radio('video', '1', false,['class'=>'video'])}} Imagen</label></li> <!-- si se selecciona esta opción mostar el input de imagen, el link del video no se verá -->
            <li><label class="radio-inline">{{Form::radio('video', '0', false,['class'=>'video'])}} Video</label></li> <!-- si se elige esta opción, sólo mostrar el input para que peguen el link -->
          </ul>
        </div>
        <div class="col-md-12" id="img" style="display: none;">
          <label for="">Selecciona la imagen para la noticia</label>
          <span><br>Tamaño recomendado: ancho 2000px y alto 1333px.</span>
          <span><br>Peso sugerido: 350Kb</span>
          {{Form::file('picture', NULL,['class'=>'form-control'])}}
          <br>
          <img src="images/banner-kcp.jpg" width="200" class="img-thumbnail">
        </div>
        <div class="col-md-12 col-xs-12" id="video" style="display: none;">
          <label for="">Link (video de YouTube)</label>{{Form::text('link', NULL, ['class'=>'form-control'])}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
        </div>
  </div> <!-- FIN ROW -->
{{Form::close()}}
@endsection
@section('js-script')
<script type="text/javascript">
  $('.state').on('change', function() {
    if($(this).val()==0){
      $('#mails').css('display', 'block');
    }else{
      $('#mails').css('display', 'none');
    }
  });

  $('.video').on('change', function() {
    if($(this).val()==0){
      $('#img').css('display', 'none');
      $('#video').css('display', 'block');
    }else{
      $('#img').css('display', 'block');
      $('#video').css('display', 'none');
    }
  });
</script>
@endsection