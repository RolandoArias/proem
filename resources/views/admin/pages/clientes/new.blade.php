@extends('admin.layouts.master')

@section('title', 'Líneas de Negocio')


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Agregando línea de negocio</h1>
  </div>
</div>

<form action="{{route('linea-negocios.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row bg_blanco"> 
        <div class="row">
          <div class="col-md-12">
            <h2>Datos de acceso</h2>
          </div>
        </div>
        
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="">Email </label><input type="text" class="form-control" placeholder="Ej. example@promin.mx"> <!-- VALIDAR que no se repitan los nombres de usuario -->
          </div>
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="">Línea de negocio de interés</label>
            <select name="" id="" class="form-control">
              <option>Todas</option>
              <option>Brunner &amp; Lay</option>
              <option>Cosben</option>
              <option>Equipo usado</option>
              <option>KCP</option>
              <option>MX</option>
              <option>PROMIN Blast</option>
              <option>PROMIN Drill</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><hr></div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h2>Datos generales</h2>
          </div>
        </div>
        <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-3">
                <label for="">Nombre </label><input type="text" class="form-control"> 
              </div>
              <div class="col-xs-12 col-sm-12 col-md-3">
                <label for="">Apellido paterno </label><input type="text" class="form-control"> 
              </div>
              <div class="col-xs-12 col-sm-12 col-md-3">
                <label for="">Apellido materno </label><input type="text" class="form-control"> 
              </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="">Email </label><input type="text" class="form-control"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="">Página web </label><input type="text" class="form-control"> 
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="">Vendedor </label>
            <select class="form-control">
              <option value="">Guillermo Yllescas</option>
              <option value="">Rafael Domínguez</option>
              <option value="">Mauricio Santana</option>
              <option value="">Michelle Espinosa</option>
              <option value="">Gabriela Pérez</option>
              <option value="">Alejandra Juárez</option>
              <option value="">Pamela</option>
            </select>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="">Comentarios </label><textarea class="form-control"></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><hr></div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h2>Datos de Facturación</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="">Nombre / Razón Social </label><input type="text" class="form-control"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="">R.F.C. </label><input type="text" class="form-control"> <!-- VALIDAR el formato del RFC -->
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="">C.P. </label><input type="text" class="form-control"> <!-- Al igual que en front, con capturar el C.P. se deberá de llenar la información de Colonia, Delegación/Municipio, Estado y País -por default es México- -->
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="">Calle </label><input type="text" class="form-control"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="">No. Ext. </label><input type="text" class="form-control">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="">No. Int. </label><input type="text" class="form-control"> 
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="">Colonia </label><input type="text" class="form-control"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="">Delegación / Municipio </label><input type="text" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="">Estado </label><input type="text" class="form-control"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="">País </label><input type="text" class="form-control"> <!-- por default México, a menos que el usuario lo cambie-->
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><hr></div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h2>Datos de Envío</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <ul class="lista_check">
              <li><label class="checkbox-inline"><input type="checkbox" value="" checked="">Usar domicilio de facturación</label></li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="">C.P. </label><input type="text" class="form-control"> <!-- Al igual que en front, con capturar el C.P. se deberá de llenar la información de Colonia, Delegación/Municipio, Estado y País -por default es México- -->
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="">Calle </label><input type="text" class="form-control"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="">No. Ext. </label><input type="text" class="form-control">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="">No. Int. </label><input type="text" class="form-control"> 
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="">Colonia </label><input type="text" class="form-control"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="">Delegación / Municipio </label><input type="text" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="">Estado </label><input type="text" class="form-control"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="">País </label><input type="text" class="form-control"> <!-- por default México, a menos que el usuario lo cambie-->
          </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
        </div>
    <div class="col-xs-12 col-sm-12 col-md-3">
      <label for="">Tipo</label>
      <ul class="lista_radio_inline">
        <li><label class="radio-inline"><input type="radio" value="mx" name="tipo" @if(old('tipo')=="mx" or old('tipo')=="") checked @endif>MX</label></li>
        <li><label class="radio-inline"><input type="radio" value="unidades" name="tipo" @if(old('tipo')=="unidades") checked @endif>Unidades</label></li>
      </ul>
      @if ($errors->has('tipo'))
          <span class="help-block">
              <strong>{{ $errors->first('tipo') }}</strong>
          </span>
      @endif
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-6">
      <label for="">Nombre </label><input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
      @if ($errors->has('nombre'))
          <span class="help-block">
              <strong>{{ $errors->first('nombre') }}</strong>
          </span>
      @endif
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
      <label for="">Siglas </label><input type="text" class="form-control" name="siglas" value="{{ old('siglas') }}">
      @if ($errors->has('siglas'))
          <span class="help-block">
              <strong>{{ $errors->first('siglas') }}</strong>
          </span>
      @endif
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <label for="">Descripción (SEO) </label><textarea class="form-control" name="descripcion">{{ old('descripcion') }}</textarea>
      @if ($errors->has('descripcion'))
          <span class="help-block">
              <strong>{{ $errors->first('descripcion') }}</strong>
          </span>
      @endif
    </div>

    <div class="col-md-12">
      <label for="">Imagen</label>
      <span><br>Tamaño recomendado: ancho 2000px y alto 1333px.</span>
      <span><br>Peso sugerido: 350Kb</span>
      <input type="file" name="picture">
      @if ($errors->has('picture'))
          <span class="help-block">
              <strong>{{ $errors->first('picture') }}</strong>
          </span>
      @endif
      <br>
      <img src="images/banner-kcp.jpg" width="200" class="img-thumbnail">
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
  </div> <!-- FIN ROW -->
</form>
@endsection